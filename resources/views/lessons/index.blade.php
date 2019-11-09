@if (count($lessons) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>日付</th>
                <th>時間</th>
                <th>コース名</th>
                <th>講師名</th>
                <th>生徒名</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
            <tr>
                <td>{!! $lesson->lesson_date !!}</td>
                <td>{!! $lesson->lesson_time !!}</td>
                <td>{!! $lesson->course->name !!}</td>
                @foreach ($lesson->entry_teachers as $teacher)
                <td>{!! $teacher->name !!}</td>
                @endforeach
                @foreach ($lesson->reserve_users as $user)
                @if(is_null($lesson->user_id))
                    <td>未予約</td>
                @else
                    <td>{!! $user->name !!}</td>
                @endif
                @endforeach
                <td>{!! link_to_route('lessons.show', '詳細', ['id' => $lesson->id]) !!}</td>>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif    

{!! link_to_route('lessons.create', 'レッスン登録',[],['class' => 'btn btn-primary']) !!}
    
