@extends('layouts.app')

@section('title', 'Optic Clubs - Booking')


@section('content')


    {{-- Flash Message Display --}}
@if(session('success'))
    <div class="alert alert-success" style="color: green; padding: 30px; background-color: #e1f8e3; border: 1px solid #d4edda; margin-bottom: 15px;">
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
        background-color: white;
    }
    .container {
        padding: 90px;
        text-align: center;
        margin: auto;
        max-width: 1000px;
    }
    .container input {
        margin-left: 25px;
    }
    .container button {
        padding: 10px;
        background: #f4f4f4;
    }
    th, td{
        padding: 15px;
        border: 2px solid #ddd;
    }
    button{
        margin-left: 20px;
    }
    span{
        color: red;
        font-weight: bold;
    }
</style>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Equipment Name</th>
                <th>Description</th>
                <th>Quantity Available</th>
                <th>Price Per Item</th>
                <th>Bookings</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($location->equipment as $equipment)
            <tr>
                <td>{{ $equipment->name }}</td>
                <td>{{ $equipment->description }}</td>
                <td>{{ $equipment->quantity_available }}</td>
                <td>{{ $equipment->price }}</td>
                <td>
                    @if ($equipment->quantity_available > 0)
                        <form method="POST" action="{{ route('bookings.store') }}">
                            @csrf
                            <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                            <input type="number" name="quantity_booked" min="1" max="{{ $equipment->quantity_available }}">
                            <button type="submit">Book</button>
                        </form>
                    @else
                        <span>Sold Out</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div><br>



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
