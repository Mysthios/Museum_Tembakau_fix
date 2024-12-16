<?php

// namespace App\Http\Controllers;

// use App\Models\User; //import this
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash; //import this for password hashing

// class UserController extends Controller
// {
//     //here create all crud logic
//     public function loadAllUsers(){
//         $all_users = User::all();
//         return view('users',compact('all_users'));
//     }

//     public function loadAddUserForm(){
//         return view('add-user');
//     }

//     public function AddUser(Request $request){
//         // perform form validation here
//         $request->validate([
//             'full_name' => 'required|string',
//             'email' => 'required|email|unique:users',
//             'phone_number' => 'required',
//             'password' => 'required|confirmed|min:4|max:8',
//         ]);
//         try {
//              // register user here
//             $new_user = new User;
//             $new_user->name = $request->full_name;
//             $new_user->email = $request->email;
//             $new_user->phone_number = $request->phone_number;
//             $new_user->password = Hash::make($request->password);
//             $new_user->save();

//             return redirect('/users')->with('success','User Added Successfully');
//         } catch (\Exception $e) {
//             return redirect('/add/user')->with('fail',$e->getMessage());
//         }
       
        
//     }

//     public function EditUser(Request $request){
//         // perform form validation here
//         $request->validate([
//             'full_name' => 'required|string',
//             'email' => 'required|email',
//             'phone_number' => 'required',
//         ]);
//         try {
//              // update user here
//             $update_user = User::where('id',$request->user_id)->update([
//                 'name' => $request->full_name,
//                 'email' => $request->email,
//                 'phone_number' => $request->phone_number,
//             ]);

//             return redirect('/users')->with('success','User Updated Successfully');
//         } catch (\Exception $e) {
//             return redirect('/edit/user')->with('fail',$e->getMessage());
//         }
//     }

//     public function loadEditForm($id){
//         $user = User::find($id);

//         return view('edit-user',compact('user'));
//     }

//     public function deleteUser($id){
//         try {
//             User::where('id',$id)->delete();
//             return redirect('/users')->with('success','User Deleted successfully!');
//         } catch (\Exception $e) {
//             return redirect('/users')->with('fail',$e->getMessage());
            
//         }
//     }
// }

namespace App\Http\Controllers;

use App\Models\User; // Tidak mengganti nama model
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm()
    {
        return view('add-user');
    }

    public function addUser(Request $request)
    {
        // Validasi data
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'ticket_type' => 'required|in:dewasa,anak-anak',
            'ticket_quantity' => 'required|integer|min:1',
            'visit_date' => 'required|date|after_or_equal:today',
        ]);

        try {
            // Menghitung total harga berdasarkan tipe tiket
            $ticket_price = $request->ticket_type === 'dewasa' ? 15000 : 5000;
            $total_price = $ticket_price * $request->ticket_quantity;

            // Menyimpan data ke database
            $new_user = new User();
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->ticket_type = $request->ticket_type;
            $new_user->ticket_quantity = $request->ticket_quantity;
            $new_user->total_price = $total_price;
            $new_user->purchase_date = now();
            $new_user->visit_date = $request->visit_date; // Tambahkan ini
            $new_user->save();

            return redirect('/users')->with('success', 'Tiket berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail', $e->getMessage());
        }
    }


    public function editUser(Request $request)
    {
        // Validasi data
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'ticket_type' => 'required|in:dewasa,anak-anak',
            'ticket_quantity' => 'required|integer|min:1',
        ]);

        try {
            // Menghitung ulang total harga berdasarkan tipe tiket
            $ticket_price = $request->ticket_type === 'dewasa' ? 15000 : 5000;
            $total_price = $ticket_price * $request->ticket_quantity;

            // Memperbarui data di database
            User::where('id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'ticket_type' => $request->ticket_type,
                'ticket_quantity' => $request->ticket_quantity,
                'total_price' => $total_price,
            ]);

            return redirect('/users')->with('success', 'Tiket berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail', $e->getMessage());
        }
    }

    public function loadEditForm($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'Tiket berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }
}
