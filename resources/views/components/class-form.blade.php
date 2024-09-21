<div id="modal" class="modal">
    <div class="modal-content">
        <h4 style="color: rgb(34, 34, 199)">Welcome to your school website</h4>
        <form id="classForm" action="{{ route('student.class', $userId) }}" method="post">
            @csrf
            <label for="class"> please select your class carefully:</label>
            <select name="class_id" id="class">

                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" name="class_id">{{ $class->name }}</option>
                @endforeach
            </select>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
