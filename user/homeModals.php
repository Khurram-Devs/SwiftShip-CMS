<?php include 'db_connect.php' ?>

<!-- Home Track Modal -->
<div class="modal fade" id="trackModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class='modal-title'>Parcel Details</h5>
                <button onclick="downloadAsPDF()" class="btn theme_btn text-light fw-semibold">PRINT <span class="icon-copy"></span></button>
            </div>
            <div class="modal-body" id="parcelDetails">
                Something went wrong &CircleTimes;
            </div>
            <div class="modal-footer display p-0 m-0">
                <button type="button" class="btn btn-primary modal_btn" data-bs-dismiss='modal'
                    aria-label='Close'>Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Home Job Modal -->
<div class="modal fade" id="applyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apply for a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jobApplicationForm"  onsubmit="sendEmail(); reset(); return false;">
                    <div class="mb-3">
                        <label for="agentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="agentName" required>
                    </div>
                    <div class="mb-3">
                        <label for="agentEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="agentEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="agentAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="agentAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="jobLocation" class="form-label">Branch</label>
                        <select class="form-select" id="jobLocation" required>
                            <option value="" disabled selected>Select Branch Location</option>

                            <?php
                            $qry = $conn->query("SELECT * FROM branches");
                            while ($row = $qry->fetch_assoc()):
                                ?>
                                <option value="<?php echo $row['id'] ?>">
                                    <?php echo $row['country'] ?>,
                                    <?php echo $row['city'] ?>
                                </option>
                            <?php endwhile; ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jobType" class="form-label">Job Type</label>
                        <select class="form-select" id="jobType" required>
                            <option value="" disabled selected>Select job type</option>
                            <option value="#">Full Time</option>
                            <option value="#">Half Time</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">CV</label>
                        <input type="file" class="form-control cv" id="cv" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="mb-3">
                        <label for="coverLetter" class="form-label">Cover Letter</label>
                        <textarea class="form-control" id="coverLetter" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modal_btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Home Testimonial Modal -->
<div class="modal fade" id="testimonialModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write your Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="testimonialForm" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control" name="occupation" required>
                    </div>
                    <div class="mb-3">
                        <label for="userImg" class="form-label">Upload Your Image</label>
                        <input type="file" name="fileToUpload" class="form-control cv" id="userImg" required
                            accept=".jpg,.jpeg,.png,.gif">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modal_btn" data-bs-dismiss="modal">Close</button>
                <button id="add-test" class="btn btn-primary modal_btn">Save</button>
            </div>
            </form>


        </div>
    </div>
</div>