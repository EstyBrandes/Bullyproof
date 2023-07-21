 <?php if ($_SESSION['user_type'] == 1): ?>
    <!-- Modal for therapists here -->
    <div class="modal" id="therapistModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Edit Simulation Summary</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <textarea class="form-control" id="summaryTextarea" rows="3"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($_SESSION['user_type'] == 2): ?>
    <!-- Modal for parents here -->
    <div class="modal fade" id="parentModal">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h5 class="modal-title">Delay Simulation</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            Are you sure you want to delay the simulation by a week?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary" id="delaySimulation">Yes</button>
            </div>
        </div>
        </div>
    </div>
 <?php endif; ?>