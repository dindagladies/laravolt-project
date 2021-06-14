<?php

namespace App\Http\Controllers;

use App\Events\DevCreated;
use App\Http\Requests\DevRequest;
use App\Models\DevModel;
use App\Models\User;
use App\Notifications\DevNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Dev extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $datas = DevModel::get()->toArray();
        // // var_dump($datas);die();
        // return view('dev.index', ['datas' => $datas]);
    }

    public function index()
    {
        $datas = DevModel::get()->toArray();

        // var_dump(compact('user'));
        // exit();

        return view('dev.index', ['datas' => $datas]);
    }

    // search
    public function search(Request $request)
    {
        $search = $request->search;
        $datas = DevModel::where('name', 'like', '%'.$search.'%')->get()->toArray();

        return view('dev.index', ['datas' => $datas]);
    }

    // create
    public function create()
    {
        return view('dev.create');
    }

    // store
    public function store(Request $request)
    {
        // insert
        $DevModel = new DevModel();
        $DevModel->name = $request->name;
        $DevModel->skill = $request->skill;
        $DevModel->save();
        // event
        // event(new DevCreated($DevModel));
        // user
        $user = User::all();
        // notification
        Notification::send($user, new DevNotification('Data "'.$request->name.'" telah ditambahkan'));
        // redirect
        return redirect()->route('create')->withSuccess('Data Magang berhasil disimpan');
    }

    // edit
    public function edit($id)
    {
        $datas = DevModel::where('id', $id)->get()->toArray();

        return view('dev.edit', ['datas' => $datas]);
    }

    // update
    public function update(DevRequest $request)
    {
        $id = $request->id;
        // update
        DevModel::where('id', $id)
            ->update($request
            ->except(['_token']));

        // user
        $user = User::all();
        // notification
        Notification::send($user, new DevNotification('Data "'.$request->name.'" telah diedit'));

        // redirect
        return redirect()->route('edit', $id)->withSuccess('Data Magang berhasil disimpan');
    }

    // delete
    public function delete($id)
    {
        DevModel::where('id', $id)->delete();

        // user
        $user = User::all();
        // notification
        Notification::send($user, new DevNotification('Data "'.$id.'" telah dihapus'));

        return redirect('/dev')->withSuccess('Data Magang berhasil dihapus');
    }

    // notification page
    public function notification()
    {
        $user = User::find(1);

        return view('dev.notification', compact('user'));
    }
}
