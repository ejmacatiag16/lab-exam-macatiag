<label>Name
    <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}">
</label>
@error('name') <div class="error">{{ $message }}</div> @enderror

<label>Email
    <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}">
</label>
@error('email') <div class="error">{{ $message }}</div> @enderror

<label>Course
    <select name="course_id">
        <option value="">-- Select course --</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}"
                @selected(old('course_id', $student->course_id ?? '') == $course->id)>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
</label>
@error('course_id') <div class="error">{{ $message }}</div> @enderror

<br><button type="submit">Save</button>
<a href="{{ route('students.index') }}">Cancel</a>