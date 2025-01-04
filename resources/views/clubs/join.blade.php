@extends('layouts.app')

@section('content')
@vite('resources/css/styles.css')

{{-- Flash Message Display --}}
@if(session('success'))
    <div class="alert alert-success" style="color: green; padding: 10px; background-color: #e1f8e3; border: 1px solid #d4edda; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="color: red; padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Basic Styling */
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, #f0faff, #cce5ff);
        color: #333;
    }

    .club-header {
        text-align: center;
        padding: 2rem;
    }

    .club-header h1 {
        color: #ff4d4d;
        font-size: 2rem;
        text-transform: uppercase;
    }

    .club-header h2 {
        color: #777;
        font-size: 1.2rem;
    }

    .club-header nav a {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5em;
        color: #0066cc;
        text-decoration: none;
        transition: color 0.3s ease, border-bottom 0.3s ease;
        padding-bottom: 5px;
    }

    .club-header nav a:hover {
        color: #ffcc00;
        border-bottom: 2px solid #ffcc00;
    }

    .club-content {
    display: flex;
    flex-direction: column; /* Optional, only if you want a vertical layout */
    justify-content: center;
    align-items: center; /* This centers the content horizontally */
    padding: 2rem;
    text-align: center;
    }

    .club-image img {
        width: 400px;
        border-radius: 10px;
        margin-right: 2rem;
    }

    .club-info {
        display: flex;
        justify-content: center;
        gap: 1rem;
        padding: 1rem 0;
    }

    .club-info a {
        text-decoration: none;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        background: linear-gradient(to right, #c3a6ff, #d8b1ff);
        color: #000000;
        font-weight: bold;
        text-align: center;
        transition: background 0.3s ease;
    }

    .club-info a:hover {
        background: linear-gradient(to right, #d8b1ff, #c3a6ff);
    }

    .about-us {
        background-color: #d4f1f9;
        padding: 2rem;
        border-radius: 5px;
        text-align: center;
        margin: 2rem 0;
    }

    .about-us button {
        padding: 0.5rem;
        border: none;
        border-radius: 5px;
        background-color: #d8b1ff;
        color: #000000;
        font-weight: bold;
        cursor: pointer;
    }

    .Events {
        padding: 2rem;
        border-radius: 5px;
        background-color: #d4f1f9;
        text-align: center;
        margin: 2rem 0;
    }

    .event-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }

    .event-card, .add-event-card {
        width: 250px;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .event-card {
        background-size: cover;
        background-position: center;
    }

    .event-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .event-info {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        z-index: 1;
    }

    .join-btn {
        padding: 0.3rem 1rem;
        background: linear-gradient(to right, #c3a6ff, #d8b1ff);
        border: none;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .join-btn:hover {
        background: linear-gradient(to right, #d8b1ff, #c3a6ff);
    }

    .about-uspic {
        background-color: #d4f1f9;
        padding: 1rem;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        margin-top: 1rem;
    }



    .comments {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        margin-top: 20px
    }

    .comments-heading {
        text-align: center;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        font-size: 2rem;
        margin-top: 20px;
        margin-bottom: 30px;
        color: #5053a8bc;
    }

    .comments-list {
        margin-bottom: 20px;
    }

    .comment-item {
        border: 1px solid #ccc;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 6px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .comment-user {
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .comment-text {
        margin: 10px 0;
        line-height: 1.5;
        color: #555;
    }

    .comment-date {
        font-size: 0.9rem;
        color: #777;
    }

    .comment-form textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-family: Arial, sans-serif;
        resize: none;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .comment-form button {
        padding: 10px 20px;
        background-color: #5053a8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .comment-form button:hover {
        background-color: #3e409c;
    }




</style>
<main>
    <section class="club-header">
        <h1>{{ $clubs->name }}</h1>
        <h2>{{ $clubs->club_type }} Club</h2>
        <nav>
            <a href="{{ route('clubs.discover') }}">Discover Clubs</a>
        </nav>
    </section>

    <section class="club-content" style="display: flex; justify-content: center; align-items: center; padding: 2rem;">
        <div class="club-image">
            <img src="{{ asset('storage/' . $clubs->main_image) }}" alt="{{ $clubs->name }}" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
        </div>
    </section>

    <section class="club-info">
        <a href="#about"><span>About</span></a>
        <a href="#events"><span>Events</span></a>
        <a href="#time-table"><span>Time Table</span></a>
        
    </section>

    <section class="about-us" id="about">
        <h1 style="display: flex; justify-content: center;font-family: Arial, sans-serif; font-weight: bold; font-size: 2rem; margin-top: 40px; margin-bottom: 20px; color: #5053a8bc;">
            ABOUT US
        </h1>
        <p style="font-weight: bold; font-size: 1.5rem;">{{ $clubs->description }}</p>
        <br>
        <br>

        <form action="{{ route('clubs.join', ['club_id' => $clubs->club_id]) }}" method="POST">
            @csrf
            <button type="submit">Join Club</button>
        </form>
    </section>
    <br>
    <br>
    <br>

    <section class="Events" id="events">
        <h1 style="display: flex; justify-content: center;font-family: Arial, sans-serif; font-weight: bold; font-size: 2rem; margin-top: 40px; margin-bottom: 20px; color: #5053a8bc;">
            EVENTS
        </h1>
        <div class="clubsowner-container">
            @foreach($clubs->events as $event)
                <div class="club-card">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->event_name }} Event">
                    <h3>{{ $event->event_name }}</h3>
                    {{-- <p>{{ $event->description }}</p> --}}
                    <p><strong>Date:</strong> {{ $event->event_date->format('F j, Y') }}</p>
                    <p><strong>Time:</strong> {{ $event->start_time }}</p>
                    <p><strong>Venue:</strong> {{ $event->venue->venue_name ?? 'TBA' }}</p><br>
                    <a href="{{ route('events.show', $event->event_id) }}"
                            <button class="join-button" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">View</button>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <br>
    <br>
    <br>

    <section class="time-table" id="time-table" style="background-color: #cce5ff; margin-top: 20px;">
        <br>
        <h1 style="display: flex; justify-content: center;font-family: Arial, sans-serif; font-weight: bold; font-size: 2rem; margin-top: 40px; margin-bottom: 20px; color:  #5053a8bc;">
            TIME TABLE
        </h1>
        @if (!empty($timetable))
            <table style="width: 40%; border-collapse: collapse;  margin-top: 20px; margin-bottom: 20px; margin-left: auto; margin-right: auto;">
                <thead>
                    <tr style="background-color:  #c3a6ff; color: rgb(0, 0, 0);font-size: 1.2rem;">
                        <th style="padding: 10px; border: 1px solid #ccc;">Day</th>
                        <th style="padding: 10px; border: 1px solid #ccc;">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timetable as $entry)
                        <tr>
                            <td style="background-color: #ffffff; padding: 10px;font-weight: bold; border: 1px solid #ccc;">{{ $entry['day'] }}</td>
                            <td style="background-color: #ffffff; padding: 10px; font-weight: bold;border: 1px solid #ccc;">{{ $entry['time'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
        @else
            <p>No timetable available for this club.</p>
        @endif
    </section> 

    <section class="comments" id="comments">
        <h1 style="display: flex; justify-content: center;font-family: Arial, sans-serif; font-weight: bold; font-size: 2rem; margin-top: 40px; margin-bottom: 20px; color: #5053a8bc;">
            Comments
        </h1>
        <!-- Comment Form -->
        <form action="{{ route('clubs.storeComment', ['club_id' => $clubs->club_id]) }}" method="POST">
            @csrf
            <textarea name="description" rows="4" placeholder="Write your comment..." required style="width: 100%; padding: 10px; margin-bottom: 10px;"></textarea>
            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Post Comment</button>
        </form>
        <br>
        <!-- Display Existing Comments -->
        <div class="comments-list" style="margin-bottom: 20px;">
            @foreach($clubs->reviews as $review)
                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <strong>{{ $review->user->name }}</strong> said:
                    <p>{{ $review->description }}</p>
                    <small>Posted on {{ $review->created_at->format('F j, Y, g:i a') }}</small>
                </div>
            @endforeach
        </div>

    </section>
</main>

<br>
<br>
<br>

<!-- Footer Section -->
<footer style="background:linear-gradient(rgba(0,0,0,0.5),#0066cc), url('{{ asset('images/background.jpeg') }}'); padding: 60px; display: flex; justify-content: space-around;">
        <div class="footer-content" style="display: flex; justify-content: space-around; gap: 20px; width: 100%;">
            <!-- Footer Logo -->
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Optic Clubs Logo" class="logo" style="width: 150px; height: auto; margin-right: 100px;">
            </div>
    
            <!-- Footer Text -->
            <div class="footer-text" style="width: 40%; margin-left: -200px;">
                <h1>Terms & Conditions</h1><br>
                <p>"Welcome to Optic, your gateway to a vibrant community of sports enthusiasts! By accessing and using our platform, you agree to comply with the following terms and conditions, which are designed to ensure a safe, inclusive, and enjoyable experience for all users. Optic promotes participation in both indoor and outdoor sports, connecting individuals, teams, and clubs to foster a thriving community."</p>
            </div>
    
            <!-- Social Media Links -->
            <div class="social-media">
                <a href="#"><img src="{{ asset('images/instagram-removebg-preview.png') }}" class="logo1" alt="Instagram" style="width: 30px; height: auto;"></a><br>
                <a href="#"><img src="{{ asset('images/facebook-removebg-preview.png') }}" class="logo1" alt="Facebook" style="width: 30px; height: auto;"></a><br>
                <a href="#"><img src="{{ asset('images/twitter-removebg-preview.png') }}" class="logo1" alt="Twitter" style="width: 30px; height: auto;"></a><br>
                <a href="#"><img src="{{ asset('images/youtube-removebg-preview.png') }}" class="logo1" alt="YouTube" style="width: 30px; height: auto;"></a>
            </div>
        </div>
    </footer>
@endsection
