<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tracks - {{ $course->name }}</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                Manage Tracks: {{ $course->name }}
            </h1>
            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary">
                Back to Course
            </a>
        </div>

        <div class="alert alert-info">
            Select tracks to associate with this course
        </div>

        <form action="{{ route('courses.update-tracks', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0">Available Tracks</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($tracks as $track)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="track_ids[]" value="{{ $track->id }}"
                                       id="track_{{ $track->id }}"
                                       {{ $course->tracks->contains($track->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="track_{{ $track->id }}">
                                    <span class="badge bg-primary fs-6">{{ $track->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button class="primary" name="Save Associations"></x-button>
            </div>
        </form>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>