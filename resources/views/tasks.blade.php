@extends('layouts.plan')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">
                    @include('errors')
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
			            <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add a task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($tasks) > 0)
                <div class="grabbable panel panel-default">
                    <div class="panel-heading">
                        Tasks :  {{ count($tasks) }}
						 <div style="text-align: center;"> 
		                        <b>Priority : </b> 
		                         <input id="priority" type="text" value="" /> 
	                     </div> 
                    </div>
					<br />
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <tbody>
							<div id="dragList">
                                @foreach ($tasks as $task)
								   <div id="taskNum{{$task->id}}" class="itemList">
                                        <div>{{ $task->name }}</div>
                                        <div>{{ $task->created_at }}</div>
										<div>
											<div>
										 <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
											</div>											
										<div>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
												<div>
                                <input type="text" name="updatename" id="task-name" class="form-control" value="{{$task->name}}">
								               </div>
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-btn fa-edit"></i>Edit 
                                                </button>
                                            </form>
											</div>
											</div>
									</div>
							
                                @endforeach
								</div>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection