@extends('layouts.master')
@section('body')

<form action="{{route('addTask')}}" method="post">
    @csrf
    <input type="text" name="task" id="name">
    <button type="submit">ADD</button>
</form>

    <Table>
        <tr>
            <th>Task</th>
        </tr>
        <tbody>
            @foreach($data as $value)
                <tr>
                    <td>{{$value["tasks"]}}</td>
                    <td>
                        <form action="{{route("delete",["id"=>$value["id"]])}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </Table>
@endsection