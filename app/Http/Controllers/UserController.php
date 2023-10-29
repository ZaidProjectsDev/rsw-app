<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Check if the authenticated user is an admin
        //If not, silently throw them in jail for trying to dominate the website.
        if (!$this->checkUserAdmin()) {
       return $this->quarantineUserQuietly();
        }

        // Get the list of users, excluding the admin user
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        // Check if the authenticated user is an admin
        if (!$this->checkUserAdmin()) {
            $this->quarantineUserQuietly();
        }

        // Find the user to delete
        $userToDelete = User::find($id);
        $oldUserName = $userToDelete->name;
        if (!$userToDelete) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        // Prevent the deletion of the admin user and punish the user because they somehow were able to get to this point.
        if ($userToDelete->role_id == 2) {
           $this->quarantineUserQuietly();
        }

        // Validate and handle errors appropriately
        try {
            // Delete related submissions and configurations
            if ($userToDelete->submissions()->count() > 0) {
                $userToDelete->submissions()->delete();
            }
            $userToDelete->configurations()->delete();
            $userToDelete->delete();
            return redirect()->route('admin.users.index')->with('success', $oldUserName.' deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', $e->getMessage());
        }
    }
    public function quarantine()
    {
        // Fetch a list of users (excluding admins) for quarantine management
        $users = User::where('id', '!=', auth()->user()->id)
            ->get();

        return view('admin.users.quarantine.index', compact('users'));
    }

    public function updateQuarantineStatus(Request $request, $userId)
    {
        // Update the quarantine status of the selected user
        $user = User::find($userId);
        if ($user) {
            $user->quarantined = !$user->quarantined;
            $user->save();
        }

        return redirect()->route('admin.users.index')->with('success', 'User quarantine status updated.');
    }
    public function quarantineUserQuietly()
    {
        $user = Auth::user();
        $user->quarantined = 1;
        $user->save();

        return redirect()->route('home');
    }
    public function checkUserAdmin()
    {
        return (Auth::user()->role_id == 2);
    }
    //
    public static function getRole($id)
    {
        $user = User::findOrFail($id);
        $role = Role::findOrFail($user->role_id);
        return $role;
    }
}
