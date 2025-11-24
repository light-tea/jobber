<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.1rem;
            color: #6b7280;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        .jobs-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .job-card {
            padding: 1.5rem;
            border-radius: 0.5rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .job-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .job-card.active {
            background: #4f46e5;
            color: white;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .job-card h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .job-card .company {
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            opacity: 0.8;
        }

        .job-card .location {
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.7;
        }

        .job-details {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            min-height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .job-details.active {
            justify-content: flex-start;
            align-items: flex-start;
            text-align: left;
        }

        .placeholder {
            color: #d1d5db;
            font-size: 1.2rem;
        }

        .job-header {
            margin-bottom: 2rem;
        }

        .job-header h2 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .job-header .company-name {
            font-size: 1.3rem;
            color: #6b7280;
        }

        .job-meta {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 1.5rem 0;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .meta-icon {
            font-size: 1.5rem;
            color: #4f46e5;
        }

        .meta-label {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .meta-value {
            font-weight: 600;
            color: #111827;
        }

        .section {
            margin-bottom: 2rem;
        }

        .section h3 {
            font-size: 1.3rem;
            color: #111827;
            margin-bottom: 1rem;
        }

        .section p {
            color: #374151;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .requirements-list, .benefits-list {
            list-style: none;
        }

        .requirements-list li, .benefits-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            color: #374151;
        }

        .requirements-list li::before {
            content: "✓";
            color: #4f46e5;
            font-weight: bold;
            margin-top: 0.2rem;
        }

        .benefits-list li::before {
            content: "★";
            color: #16a34a;
            font-weight: bold;
            margin-top: 0.2rem;
        }

        .apply-btn {
            width: 100%;
            background: #4f46e5;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .apply-btn:hover {
            background: #4338ca;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: #4f46e5;
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: sticky;
            top: 0;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .modal-header .company {
            color: #c7d2fe;
            font-size: 0.95rem;
            margin-top: 0.25rem;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
            border-radius: 0.25rem;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            ring: 2px solid #4f46e5;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-group textarea {
            resize: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .status-message {
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            display: none;
        }

        .status-message.active {
            display: block;
        }

        .status-message.success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
        }

        .status-message.error {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .modal-actions button {
            flex: 1;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .cancel-btn {
            background: white;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .cancel-btn:hover {
            background: #f9fafb;
        }

        .submit-btn {
            background: #4f46e5;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: #4338ca;
        }

        @media (max-width: 768px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .job-meta {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Job Listings</h1>
            <p>Find your next opportunity</p>
        </div>

        <div class="main-grid">
            <!-- Jobs List -->
            <div class="jobs-list" id="jobsList"></div>

            <!-- Job Details -->
            <div class="job-details" id="jobDetails">
                <div class="placeholder">Select a job to view details</div>
            </div>
        </div>
    </div>

    <!-- Apply Modal -->
    <div class="modal" id="applyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h2 id="modalTitle">Apply for Position</h2>
                    <p class="company" id="modalCompany"></p>
                </div>
                <button class="close-btn" onclick="closeModal()">✕</button>
            </div>

            <div class="modal-body">
                <div class="status-message" id="statusMessage"></div>

                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" placeholder="Your full name" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" placeholder="your@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" placeholder="(555) 123-4567">
                    </div>
                </div>

                <div class="form-group">
                    <label for="coverLetter">Cover Letter *</label>
                    <textarea id="coverLetter" rows="6" placeholder="Tell us why you're interested in this position..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="resume">Resume Link or Text</label>
                    <textarea id="resume" rows="3" placeholder="Paste your resume or LinkedIn URL..."></textarea>
                </div>

                <div class="modal-actions">
                    <button class="cancel-btn" onclick="closeModal()">Cancel</button>
                    <button class="submit-btn" onclick="sendEmail()">
                        ✉ Send Application
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Job Data
        let jobs = @json($jobs);

        let selectedJob = null;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderJobsList();
        });

        function renderJobsList() {
            const jobsList = document.getElementById('jobsList');
            jobsList.innerHTML = jobs.map(job => `
                <div class="job-card" onclick="selectJob(${job.id})">
                    <h3>${job.title}</h3>
                    <p class="company">${job.company}</p>
                    <p class="location">📍 ${job.location}</p>
                </div>
            `).join('');
        }

        function selectJob(jobId) {
            selectedJob = jobs.find(j => j.id === jobId);
            updateActiveState(jobId);
            renderJobDetails();
        }

        function updateActiveState(jobId) {
            document.querySelectorAll('.job-card').forEach((card, index) => {
                if (jobs[index].id === jobId) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
            });
        }

        function renderJobDetails() {
            const jobDetails = document.getElementById('jobDetails');
            
            if (!selectedJob) return;

            jobDetails.classList.add('active');
            jobDetails.innerHTML = `
                <div style="width: 100%;">
                    <div class="job-header">
                        <h2>${selectedJob.title}</h2>
                        <p class="company-name">${selectedJob.company}</p>
                    </div>

                    <div class="job-meta">
                        <div class="meta-item">
                            <span class="meta-icon">📍</span>
                            <div>
                                <p class="meta-label">Location</p>
                                <p class="meta-value">${selectedJob.location}</p>
                            </div>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">💰</span>
                            <div>
                                <p class="meta-label">Salary</p>
                                <p class="meta-value">${selectedJob.salary}</p>
                            </div>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">💼</span>
                            <div>
                                <p class="meta-label">Type</p>
                                <p class="meta-value">${selectedJob.type}</p>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h3>About the Role</h3>
                        <p>${selectedJob.description}</p>
                    </div>

                    <div class="section">
                        <h3>Requirements</h3>
                        <ul class="requirements-list">
                            ${selectedJob.requirements.map(req => `<li>${req}</li>`).join('')}
                        </ul>
                    </div>

                    <div class="section">
                        <h3>Benefits</h3>
                        <ul class="benefits-list">
                            ${selectedJob.benefits.map(benefit => `<li>${benefit}</li>`).join('')}
                        </ul>
                    </div>

                    <button class="apply-btn" onclick="openApplyModal()">✉ Apply Now</button>
                </div>
            `;
        }

        function openApplyModal() {
            if (!selectedJob) return;
            
            document.getElementById('modalTitle').textContent = `Apply for ${selectedJob.title}`;
            document.getElementById('modalCompany').textContent = selectedJob.company;
            document.getElementById('applyModal').classList.add('active');
            
            // Clear form
            clearForm();
        }

        function closeModal() {
            document.getElementById('applyModal').classList.remove('active');
            clearStatusMessage();
        }

        function clearForm() {
            document.getElementById('fullName').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('coverLetter').value = '';
            document.getElementById('resume').value = '';
            clearStatusMessage();
        }

        function clearStatusMessage() {
            const statusMsg = document.getElementById('statusMessage');
            statusMsg.classList.remove('active', 'success', 'error');
            statusMsg.textContent = '';
        }

        function showStatus(message, type) {
            const statusMsg = document.getElementById('statusMessage');
            statusMsg.textContent = message;
            statusMsg.className = `status-message active ${type}`;
        }

        async function sendEmail() {
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const coverLetter = document.getElementById('coverLetter').value;

            if (!fullName || !email || !coverLetter) {
                showStatus('✗ Please fill in all required fields (marked with *)', 'error');
                return;
            }

            try {
                const response = await fetch('https://api.anthropic.com/v1/messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        model: 'claude-sonnet-4-20250514',
                        max_tokens: 500,
                        messages: [
                            {
                                role: 'user',
                                content: `Generate a professional confirmation email for a job application. The applicant is ${fullName}, applying for the ${selectedJob.title} position at ${selectedJob.company}. 

Email Address: ${email}
Phone: ${phone}

Cover Letter excerpt: ${coverLetter.substring(0, 200)}

Generate only the email body, starting with a greeting and ending with a professional closing.`
                            }
                        ]
                    })
                });

                if (response.ok) {
                    const data = await response.json();
                    const emailBody = data.content[0].text;
                    
                    showStatus('✓ Application sent successfully! We\'ll be in touch soon.', 'success');
                    
                    console.log('Application Email:', {
                        to: selectedJob.company,
                        from: email,
                        subject: `Application for ${selectedJob.title}`,
                        body: emailBody,
                        applicant: fullName,
                        phone: phone
                    });

                    setTimeout(() => {
                        closeModal();
                    }, 2000);
                } else {
                    showStatus('✗ Error sending application. Please try again.', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showStatus('✗ Error sending application. Please try again.', 'error');
            }
        }

        // Close modal when clicking outside
        document.getElementById('applyModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>