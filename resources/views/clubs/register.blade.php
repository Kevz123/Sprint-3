@extends('layouts.app')

@section('title', 'Optic Clubs - Register Clubs')

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
        #bannerdi {
            background: linear-gradient(rgba(0,0,0,0.5), #e9f0f194), url('{{ asset('images/create club 2.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
    </style>

    <section id="bannerdi">
        <div class="navbar">
            <br><br><br><br>
        </div>
        <div class="hero">
            <h1>Register Clubs</h1>
        </div>
        <div class="hometextbtn">
            <a href="#ex"><span>Explore</span></a>
        </div>
    </section>

    <div id="ex"></div>

    <div class="form-container">
        <h2>CLUB FORM</h2>
        <form method="POST" action="{{ route('clubs.store') }}" id="clubForm" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            
            <!-- Club Name -->
            <label for="clubName">Club Name:</label>
            <input type="text" id="clubName" name="clubName" required pattern=".{3,50}" title="Club name should be between 3 to 50 characters.">
            <br><br>

            <!-- Main Picture Upload -->
            <label for="main_image">Upload Club Image:</label>
            <label for="main_image">(Accepted file types: jpeg, png, jpg, gif.)</label>
            
            <input type="file" id="main_image" name="main_image" accept="image/*" required onchange="previewImage(event)">
            <img id="mainPicturePreview" alt="Main Picture Preview" style="display:none; width:100px; height:auto; margin-top:10px;">
            <br>
            <br>

            <!-- Club Description -->
            <label for="clubDescription">Club Description:</label>
            <textarea id="clubDescription" name="clubDescription" rows="4" required minlength="10" maxlength="500" title="Club description should be between 10 to 500 characters."></textarea>
            <br>

            <!-- Club Size -->
            <label for="clubSize">Club Size:</label>
            <select id="clubSize" name="clubSize" required>
                <option value="small">Small (10-20 members)</option>
                <option value="medium">Medium (30-50 members)</option>
                <option value="large">Large (50+ members)</option>
            </select>
            <br>
            <br>

            <!-- Club Type -->
            <label>Club Type:</label>
            <div>
                <label for="physical">Physical</label>
                <input type="radio" id="physical" name="clubType" value="physical" required>
                <label for="nonPhysical">Non-Physical</label>
                <input type="radio" id="nonPhysical" name="clubType" value="non-physical" required>
            </div>
            <br>

            <!-- Monthly Practice Timetable -->
            <label>Monthly Practice Timetable :</label>
            <table id="timetable-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="timetable[0][day]" placeholder="e.g., Monday" required pattern="^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)$" title="Enter a valid day (e.g., Monday)"></td>
                        <td><input type="text" name="timetable[0][time]" placeholder="e.g., 10:00 - 12:00" required pattern="^[0-9]{2}:[0-9]{2}\s*-\s*[0-9]{2}:[0-9]{2}$" title="Enter a valid time range (e.g., 10:00 - 12:00)"></td>
                        <td><button type="button" onclick="addRow()">Add Row</button></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
        
            <!-- PayPal Button -->
            <div class="paypal-payment">
                <a href="{{ route('payment.create') }}" class="btn btn-primary">Proceed with PayPal</a>
            </div>
            <br>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit</button>
            <br>
            <br>
        </form>
        
        <script>
            let rowIndex = 1;
            
            function addRow() {
                const table = document.getElementById('timetable-table').getElementsByTagName('tbody')[0];
                const newRow = table.insertRow();
                newRow.innerHTML = `
                    <td><input type="text" name="timetable[${rowIndex}][day]" placeholder="e.g., Monday" required pattern="^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)$" title="Enter a valid day (e.g., Monday)"></td>
                    <td><input type="text" name="timetable[${rowIndex}][time]" placeholder="e.g., 10:00 - 12:00" required pattern="^[0-9]{2}:[0-9]{2} - [0-9]{2}:[0-9]{2}$" title="Enter a valid time range (e.g., 10:00 - 12:00)"></td>
                    <td><button type="button" onclick="removeRow(this)">Remove</button></td>
                `;
                rowIndex++;
            }
        
            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        
            // Image preview function
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('mainPicturePreview');
                    output.style.display = 'block';
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        
            // Additional form validation
            function validateForm() {
                const clubName = document.getElementById('clubName').value;
                if (clubName.length < 3 || clubName.length > 50) {
                    alert('Club name must be between 3 and 50 characters.');
                    return false;
                }
                
                const clubDescription = document.getElementById('clubDescription').value;
                if (clubDescription.length < 10 || clubDescription.length > 500) {
                    alert('Club description must be between 10 and 500 characters.');
                    return false;
                }
                
                return true;
            }
        </script>
        
    </div>

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
