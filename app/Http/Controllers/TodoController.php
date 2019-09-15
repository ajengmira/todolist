<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class TodoController extends Controller
{
	protected $url;

	public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function index()
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];
        return view('todos.index', $data);
    }

    public function save(Request $request)
    {
    	$name = $request->input('name');

    	$save = Todo::create($request->all()); 
    	$is_done = 'Not Done';

    	if(!empty($save->id)){
    		echo json_encode(array(
    			'success' => true,
    			'data' => '<tr data-id="'.$save->id.'">
    						<td><input type="checkbox" value="'.$save->id.'" class="check_id"> '.$name.'</td>
    						<td>'.$is_done.'</td>
    						<td><a class="btn btn-warning" href="'.$this->url->to('/').'/todos/'.$save->id.'/edit">Edit</a>
                                <a class="btn btn-danger btn_delete" href="javascript:;" data-id="'.$save->id.'">Delete</a></td>
    					</tr>'
    		));
    	}else{
    		echo json_encode(array(
    			'success' => false
    		));
    	}

    }

    public function del(Request $request)
    {
    	$id = $request->input('id');

    	$save = Todo::find($id)->delete($id);

    	if($save){
    		echo json_encode(array(
    			'success' => true
    		));
    	}else{
    		echo json_encode(array(
    			'success' => false
    		));
    	}

    }

    public function dels(Request $request)
    {
    	$ids = $request->input('ids');

    	$ids = explode(',', $ids);

    	$count = 0; 
    	foreach ($ids as $id) {
    		$save = Todo::find($id)->delete($id);
    		$count++;
    	} 

    	if($count > 0){
    		echo json_encode(array(
    			'success' => true,
    			'data' => $ids
    		));
    	}else{
    		echo json_encode(array(
    			'success' => false
    		));
    	}

    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        Todo::create($request->all());

        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return redirect('/');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }
}
