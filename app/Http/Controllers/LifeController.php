<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;

class LifeController extends Controller
{
    public function index(){
        return view("index");
    }

    public function create(){
        return view("create");
    }

    public function projects(Request $request){
        $search = $request->search;

        if($search){
            $projects = Project::where([
                ['title', 'like', '%'.$search.'%'] 
            ])->with('user')->get();
        }
        
        else{
            $projects = Project::all();
        }

        return view('projects', ['search' => $search, 'projects' => $projects]);
    }

    public function store(Request $request){
        $project = new Project;

        $project->title = $request->title;
        $project->description = $request->description;
        $project->items = $request->items;
        $project->repository = $request->repository;

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/projects'), $imageName);

            $project->image = $imageName;

        }

        $user = auth()->user();
        $project->user_id = $user->id;

        $project->save();

        return redirect('/projects');
    }

    public function show($id){
        $project = Project::findOrFail($id);
        $comments = Comment::where('project_id', $id)->get();

        return view('show', ['project' => $project, 'comments' => $comments]);
    }

    public function comment(Request $request, $id){
        $comment = new Comment;

        $user = auth()->user();

        $comment->project_id = $id;
        $comment->user_name = $user->name;
        $comment->commentary = $request->commentary;

        $comment->save();

        return redirect('/projects/show/'.$id);
    }

    public function dashboard(){
        $user = auth()->user();

        $projects = $user->projects;

        return view('dashboard', ['projects' => $projects, 'user' => $user]);
    }

    public function delete($id){
        Project::findOrFail($id)->delete();

        return redirect('/dashboard');
    }

    public function edit($id){
        $project = Project::findOrFail($id);

        return view('edit', ['project' => $project]);
    }

    public function update(Request $request) {

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/projects'), $imageName);

            $data['image'] = $imageName;

        }

        Project::findOrFail($request->id)->update($data);

        return redirect('/dashboard');
    }
}
