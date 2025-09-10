
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



    // Activity selection

    document.querySelectorAll('.activity-list li').forEach(activity => {

        activity.addEventListener('click', function () {

            const project = this.getAttribute('data-project');

            const activityName = this.getAttribute('data-activity');



            // Update hierarchy navigation

            document.getElementById('current-project').textContent =

                document.querySelector(`.project-card [data-project="${project}"]`)

                    .closest('.project-card')

                    .querySelector('.project-header h3').textContent;



            document.getElementById('current-activity').textContent =

                this.textContent.split('<')[0].trim();



            // Switch to activity view

            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

            document.querySelector('[data-target="activity-view"]').classList.add('active');



            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove(
                'active'));

            document.getElementById('activity-view').classList.add('active');

        });

    });



    // Back to projects button

    document.getElementById('back-to-projects').addEventListener('click', function () {

        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

        document.querySelector('[data-target="projects-view"]').classList.add('active');



        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        document.getElementById('projects-view').classList.add('active');

    });



    // Sequential deliverables logic

    const checkboxes = document.querySelectorAll('.step-checkbox');

    checkboxes.forEach((checkbox, index) => {

        checkbox.addEventListener('change', function () {

            // If checked, enable the next checkbox

            if (this.checked && index < checkboxes.length - 1) {

                checkboxes[index + 1].disabled = false;

                checkboxes[index + 1].nextElementSibling.nextElementSibling.textContent =
                    "Pending";

                checkboxes[index + 1].nextElementSibling.nextElementSibling.className =
                    "step-status status-pending";

            }



            // If unchecked, disable all subsequent checkboxes

            if (!this.checked) {

                for (let i = index + 1; i < checkboxes.length; i++) {

                    checkboxes[i].checked = false;

                    checkboxes[i].disabled = true;

                    checkboxes[i].nextElementSibling.nextElementSibling.textContent =
                        "Pending";

                    checkboxes[i].nextElementSibling.nextElementSibling.className =
                        "step-status status-pending";

                }

            }



            // Update progress

            updateActivityProgress();

        });

    });



    // Editable fields

    document.querySelectorAll('.editable-field').forEach(field => {

        if (field.tagName !== 'SELECT') {

            field.addEventListener('click', function () {

                const currentValue = this.textContent;

                const input = document.createElement('input');

                input.type = 'text';

                input.value = currentValue;

                input.style.width = '100%';

                input.style.fontSize = 'inherit';

                input.style.fontWeight = 'inherit';

                input.style.border = '1px solid #3498db';

                input.style.borderRadius = '4px';

                input.style.padding = '5px';



                this.textContent = '';

                this.appendChild(input);

                input.focus();



                input.addEventListener('blur', function () {

                    const newValue = this.value;

                    this.parentElement.textContent = newValue;

                    updateActivityProgress();

                });



                input.addEventListener('keyup', function (e) {

                    if (e.key === 'Enter') {

                        this.blur();

                    }

                });

            });

        }

    });



    // Save button functionality

    document.getElementById('save-btn').addEventListener('click', function () {

        alert('Activity data saved successfully!');

    });



    // Export button functionality

    document.getElementById('export-btn').addEventListener('click', function () {

        // Create CSV content

        let csvContent = "Project,Activity,Progress,Budget Allocated,Budget Utilized,Proponent\n";



        // Add sample data for demonstration

        csvContent += "I-CARE,Employee Training Program,71%,₱250,000,₱165,000,Juan Dela Cruz\n";

        csvContent += "SINULID,Reading Enhancement Program,65%,₱180,000,₱120,000,Maria Santos\n";

        csvContent += "SAGIP,Dropout Prevention Program,90%,₱320,000,₱280,000,Carlos Reyes\n";



        // Create download link

        const blob = new Blob([csvContent], {
            type: 'text/csv;charset=utf-8;'
        });

        const link = document.createElement('a');

        const url = URL.createObjectURL(blob);



        link.setAttribute('href', url);

        link.setAttribute('download', 'labong_projects_export.csv');

        link.style.visibility = 'hidden';



        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);



        alert('Projects exported to CSV file!');

    });



    // Form submission

    document.getElementById('activity-form').addEventListener('submit', function (e) {

        e.preventDefault();



        // Get form values

        const title = document.getElementById('activity-title').value;

        const project = document.getElementById('project-category').value;

        const budgetSource = document.getElementById('budget-source-create').value;

        const firstName = document.getElementById('proponent-firstname').value;

        const surname = document.getElementById('proponent-surname').value;

        const budget = document.getElementById('budget-allocated-create').value;

        const targetDate = document.getElementById('target-date-create').value;



        // Show success message

        alert(`Activity "${title}" created successfully under ${project} project!`);



        // Reset form

        this.reset();

    });



    // Initialize activity progress

    updateActivityProgress();

});



// Update activity progress

function updateActivityProgress() {

    // Calculate progress

    let completedSteps = 0;

    const checkboxes = document.querySelectorAll('.step-checkbox');

    checkboxes.forEach(checkbox => {

        if (checkbox.checked) completedSteps++;

    });



    const progressPercentage = Math.round((completedSteps / 15) * 100);

    document.getElementById('progress-percentage').textContent = `${progressPercentage}%`;

    document.getElementById('progress-bar').style.width = `${progressPercentage}%`;



    // Update deliverables status

    document.getElementById('deliverables-status').textContent =

        `Based on ${completedSteps}/15 deliverables`;



    // Calculate accomplishment rating

    const accomplishmentRating = Math.min(5, Math.round((completedSteps / 15) * 20) / 4);

    document.getElementById('accomplishment-rating').textContent = accomplishmentRating.toFixed(1);

    updateStars('.rating-card:first-child .rating-stars', accomplishmentRating);



    // Calculate budget values

    const allocated = parseFloat(document.getElementById('allocated-amount').textContent.replace(/,/g, '')) || 0;

    const utilized = parseFloat(document.getElementById('utilized-amount').textContent.replace(/,/g, '')) || 0;

    const remaining = allocated - utilized;

    const burPercentage = allocated > 0 ? Math.round((utilized / allocated) * 100) : 0;



    document.getElementById('budget-allocated').textContent = `₱${allocated.toLocaleString()}`;

    document.getElementById('budget-utilized').textContent = `₱${utilized.toLocaleString()}`;

    document.getElementById('budget-remaining').textContent = `₱${remaining.toLocaleString()}`;

    document.getElementById('bur-percentage').textContent = `${burPercentage}%`;



    // Update BUR rating

    const burRating = calculateRating(burPercentage);

    document.getElementById('bur-rating').textContent = burRating.toFixed(1);

    updateStars('.rating-card:nth-child(2) .rating-stars', burRating);

    document.getElementById('bur-status').textContent = `${burPercentage}% of budget utilized`;



    // Calculate overall rating

    const overallRating = (accomplishmentRating + burRating + 5) / 3;

    document.getElementById('overall-rating').textContent = overallRating.toFixed(1);

    updateStars('.rating-card:nth-child(4) .rating-stars', overallRating);



    // Set overall status

    let statusText = '';

    if (overallRating >= 4.5) statusText = 'Activity Health: Excellent';

    else if (overallRating >= 4) statusText = 'Activity Health: Very Good';

    else if (overallRating >= 3.5) statusText = 'Activity Health: Good';

    else if (overallRating >= 3) statusText = 'Activity Health: Fair';

    else statusText = 'Activity Health: Needs Attention';



    document.getElementById('overall-status').textContent = statusText;

}



// Calculate rating from 0-5

function calculateRating(percentage) {

    if (percentage >= 90) return 5.0;

    if (percentage >= 80) return 4.5;

    if (percentage >= 70) return 4.0;

    if (percentage >= 60) return 3.5;

    if (percentage >= 50) return 3.0;

    if (percentage >= 40) return 2.5;

    if (percentage >= 30) return 2.0;

    if (percentage >= 20) return 1.5;

    if (percentage >= 10) return 1.0;

    return 0.5;

}



// Update star rating display

function updateStars(selector, rating) {

    const starsContainer = document.querySelector(selector);

    starsContainer.innerHTML = '';



    const fullStars = Math.floor(rating);

    const hasHalfStar = rating % 1 >= 0.5;



    // Add full stars

    for (let i = 0; i < fullStars; i++) {

        starsContainer.innerHTML += '<i class="star fas fa-star filled"></i>';

    }

    // Add half star if needed

    if (hasHalfStar) {

        starsContainer.innerHTML += '<i class="star fas fa-star-half-alt filled"></i>';

    }

    // Add empty stars

    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

    for (let i = 0; i < emptyStars; i++) {

        starsContainer.innerHTML += '<i class="star far fa-star"></i>';

    }

}
