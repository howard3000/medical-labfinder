<?php

namespace App\Http\Controllers;
use App\Models\TestDetail;
use App\Models\Lab;
use Illuminate\Http\Request;

class TestDetailController extends Controller
{
    public function index(TestDetail $test_details){
        // $labs = Lab::get();
        $test_details = TestDetail::get();
        
        return view('Test.index', compact( 'test_details'));
    }
    public function create(Lab $labs){
        $labs = Lab::get();

        return view('Test.create', compact('labs'));
    }
    public function store(Request $request){
        

        $attributes = $request->validate([

            'name' => 'required',
            'date' => 'required',
            'test' => 'required',
            'status' => 'required',
            'lab_name' => 'required',

        ]);

        $attributes['user_id'] = auth()->user()->id;

        //dd($attributes);

        TestDetail::create($attributes);

        return back()->with('status', 'Upload successful');
    }
    public function edit(Request $request, TestDetail $test_detail){
       

        $this->authorize('edit', $test_detail);

        return view('Test.edit', compact('test_detail'));

    }
    public function show(Request $request, TestDetail $test_detail){

        $this->authorize('show', $test_detail);
        return view('test.show', compact('test_detail'));
    }

    public function update(Request $request, TestDetail $test_detail){

        $this->authorize('update', $test_detail);
            

        //update form detais
         $attributes = $request->validate([

                    'name' => 'required',
                    'date' => 'required',
                    'test' => 'required',
                    'status' => 'required',
                    'lab_name' => 'required',

                ]);


        TestDetail::where('id', $test_detail->id)->update($attributes);

        return redirect('/view-test-details')->with('status', 'Update is successful');

    }




    public function destroy(Request $request, TestDetail $test_detail){

//AuthServiceProvider arguments dictates user that can delete it through a PostPolicy or Gate facade that you define not both

        $this->authorize('delete', $test_detail);

        $test_detail->delete();

        return back()->with('status', 'Client details deleted successfully!');
    }
}
