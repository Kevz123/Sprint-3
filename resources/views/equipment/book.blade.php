@extends('layouts.app')

@section('title', 'Optic Clubs - Equipment Booking')

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
main {
    background-color: #f4f4f4;
}
#bannerdi {
    background: linear-gradient(rgba(0,0,0,0.5), #128b9e94), url('{{ asset('images/equbooking.jpg') }}');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
table{
    background-color: orange;
}
.containers {
    margin: 20px auto;
    max-width: 700px;
}
.containers h1{
    font-size: 35px;
}
.sport-section {
    background: #fff;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
}
.sport-section h2 {
    font-size: 25px;
    color: #333;
    margin-left: 5px;
}
.sport-section h3{
    font-size: 20px;
}
.location {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
}
.location img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    margin-left: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
}
.location h3 {
    margin: 0;
    color: #555;
}
.location p {
    margin: 5px 0;
    color: #666;
}
.location a {
    font-size: 20px;
}
.location-info {
    margin-left: 15px;
}
</style>


<body>
<main>
    
<section id="bannerdi">
    <div class="navbar">
        <br><br><br><br>
    </div>
    <div class="hero">
        <h1>Equipment Booking</h1>
    </div>
    <div class="hometextbtn">
        <a href="#ex"><span>Explore</span></a>
    </div>
</section>

<div id="ex"></div>
<br>
<div class="containers">
    <h1><b>Physical Sports</b></h1>
    @foreach ($locations as $location)
        @if ($location->is_physical == 1)  <!-- Check if the location is physical -->
            <div class="sport-section">
                <h2><b>{{ $location->sports_name }}</b></h2><br>
                <div class="location">
                    <img src="{{ asset('images/locations/' . $location->image) }}" alt="{{ $location->sports_name }}">
                    <div class="location-info">
                        <h3>{{ $location->shop_name }}</h3>
                        <p>{{ $location->address }}</p>
                        <p>Contact: {{ $location->contact_number }}</p>
                        <a href="{{ route('equipment.show', $location->id) }}">View</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

<br>
<div class="containers">
    <h1><b>Non-Physical Sports</b></h1>
    @foreach ($locations as $location)
        @if ($location->is_physical == 0)  <!-- Check if the location is non-physical -->
            <div class="sport-section">
                <h2><b>{{ $location->sports_name }}</b></h2><br>
                <div class="location">
                    <img src="{{ asset('images/locations/' . $location->image) }}" alt="{{ $location->sports_name }}">
                    <div class="location-info">
                        <h3>{{ $location->shop_name }}</h3>
                        <p>{{ $location->address }}</p>
                        <p>Contact: {{ $location->contact_number }}</p>
                        <a href="{{ route('equipment.show', $location->id) }}">View</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div><br>


</main>
</body>


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
