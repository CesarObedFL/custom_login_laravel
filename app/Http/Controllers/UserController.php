<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function get_all_users()
    {
        return response()->json(User::all());
    }

    public function get_user_by_id($user_id)
    {
        $user = User::findOrFail($user_id);
        if( $user ) {
            return response()->json([ 'user' => $user ], 200);
        }
        return response()->json([ 'code' => 404, 'message' => 'the requested resource was not found!...'], 404); 
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,'. $request->get('id'),
            'phone' => 'required|numeric|digits:10',
            'rfc' => 'required',
            'notes' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([ 'code' => 400, 'message' => 'something went wrong!...', 'errors' => $validator->errors() ], 404); 
        }

        User::where('id', $request->get('id'))->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'rfc' => $request->get('rfc'),
            'notes' => $request->get('notes'),
        ]);

        return response()->json([ 'message' => 'User updated successfully!...' ], 200);
    }

    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);
        if ( $user ) {
            $user->delete();
            return response()->json([ 'message' => 'User deleted successfully!...' ], 200);
        }

        return response()->json([ 'message' => 'User not found!...' ], 404);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.csv');
    }
}
