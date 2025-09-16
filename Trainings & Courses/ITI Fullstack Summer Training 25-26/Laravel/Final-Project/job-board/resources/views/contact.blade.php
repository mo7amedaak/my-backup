
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <h2 class="mb-4 text-success text-center">Contact Us</h2>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Type your message..." required></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-4">Send</button>
                    </div>
                </form>
                <div class="mt-4 text-center text-muted">
                    Or email us at <a href="mailto:info@jobboard.com" class="text-success">info@jobboard.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection