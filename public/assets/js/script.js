
document.addEventListener('DOMContentLoaded', function () {

    // Tab functionality

    document.querySelectorAll('.tab').forEach(tab => {

        tab.addEventListener('click', function () {

            // Remove active class from all tabs

            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));



            // Add active class to clicked tab

            this.classList.add('active');



            // Hide all tab content

            document.querySelectorAll('.tab-content').forEach(content => {

                content.classList.remove('active');

            });



            // Show the target tab content

            const target = this.getAttribute('data-target');

            document.getElementById(target).classList.add('active');

        });

    });

});



// Update activity progress

function updateActivityProgress() {


    // Set overall status

    let statusText = '';

    if (overallRating >= 4.5) statusText = 'Activity Health: Excellent';

    else if (overallRating >= 4) statusText = 'Activity Health: Very Good';

    else if (overallRating >= 3.5) statusText = 'Activity Health: Good';

    else if (overallRating >= 3) statusText = 'Activity Health: Fair';

    else statusText = 'Activity Health: Needs Attention';



    document.getElementById('overall-status').textContent = statusText;

}

