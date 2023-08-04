<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

        <div class="search-bar" style="display: flex;align-items: center;margin-bottom: 10px;">
            <select id="speciality-select" class="form-control" style="flex-grow: 1;margin-right: 10px;padding: 8px;border: 1px solid #ccc;border-radius: 4px;">
                <option value="">Select Speciality</option>
                 <option>Neurologist</option>
                 <option>Pediatrician</option>
                 <option>Family medicine</option>
                 <option>Urologists</option>
                 <option>Cardiologist</option>
                <option>Psychiatrist</option>
                <option>Dermatology</option>
                <option>ophthalmologist</option> 
                 <option>Dentist</option>                                    
                
            </select>
            &nbsp;&nbsp;&nbsp;
            <button id="search-btn" class="btn btn-primary" onclick="searchDoctors()">Search</button>
        </div>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach($doctor as $doctors)
            <div class="item" data-speciality="{{$doctors->speciality}}">
                <div class="card-doctor">
                    <div class="header">
                        <img height="300px" src="doctorimage/{{$doctors->image}}" alt="">
                    </div>
                    <div class="body">
                        <p class="text-xl mb-0">{{$doctors->firstname}}  {{$doctors->lastname}}</p>
                        <span class="text-sm text-grey">{{$doctors->speciality}}</span>
                    </div>
                </div>
                <div style="text-align: center;">
                    <a href="{{ Auth::check() ? url('makeappointment',$doctors->id) : route('login') }}" class="btn btn-primary">Channel Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function searchDoctors() {
        var selectedSpeciality = document.getElementById('speciality-select').value;
        var doctorItems = document.getElementsByClassName('item');
        var carousel = document.getElementById('doctorSlideshow');

        // Show/hide doctors based on the selected speciality
        for (var i = 0; i < doctorItems.length; i++) {
            var speciality = doctorItems[i].getAttribute('data-speciality');

            if (selectedSpeciality === '' || speciality === selectedSpeciality) {
                // Show the matched doctor item
                doctorItems[i].style.display = 'block';
            } else {
                // Hide the non-matched doctor items
                doctorItems[i].style.display = 'none';
            }
        }

        // Move the selected doctor to the first place in the carousel
        var selectedDoctor = document.querySelector('.item[data-speciality="' + selectedSpeciality + '"]');
        if (selectedDoctor) {
            var firstItem = carousel.firstChild;
            carousel.insertBefore(selectedDoctor, firstItem.nextSibling);
        }
    }
</script>



