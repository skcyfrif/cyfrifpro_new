<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon"><i class="icon-th"></i></span>
          <h5>List</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gmail</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if($applications): ?>
                <?php $i=1; foreach($applications as $key): ?>
                  <tr class="gradeX">
                    <td class="center"><?php echo $i; ?></td>
                    <td><?php echo $key->name; ?></td>
                    <td><?php echo $key->email; ?></td>
                    <td><?php echo $key->mobile; ?></td>
                    <td>
                      <?php $date = explode(' ', $key->created); ?>
                      <?php echo date('d M Y', strtotime($date[0])); ?>
                    </td>
                    <td><?php echo isset($key->scheduledate) ? $key->scheduledate : 'Not Schedule'; ?></td>
                    <td><?php echo isset($key->scheduletime)  ? $key->scheduletime : 'Not Schedule' ; ?></td>
                    <td class="td-actions">
                      <a href="<?php echo base_url();?><?php echo $key->documentPath; ?>" target="_blank" class="btn btn-sx btn-primary">
                        Document
                      </a>
                      <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_career_applications" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
                        Delete
                      </a>
                      </a>
  <!-- <a href="#" 
     data-id="<?php // echo $key->id; ?>" 
     data-toggle="modal" 
     data-target="#scheduleModal"
     class="btn btn-sx btn-primary btn-schedule"
     <?php // if (isset($key->scheduledate) && isset($key->scheduletime)): ?>
       data-scheduledate="<?php // echo $key->scheduledate; ?>"
       data-scheduletime="<?php // echo $key->scheduletime; ?>"
     <?php  // endif; ?>>
    <?php // echo (isset($key->scheduledate) && isset($key->scheduletime)) ? 'Re-Schedule' : 'Schedule'; ?>
  </a> -->

  <a href="#" 
   data-id="<?php echo $key->id; ?>" 
   data-status="<?php echo $key->status; ?>" 
   class="btn btn-sx btn-warning btn-toggle-reject">
  <?php echo ($key->status === 'rejected') ? 'Un-Reject' : 'Reject'; ?>
</a>

                    </td>
                  </tr>
                <?php $i++; endforeach; ?>
              <?php else: ?>
                <tr class="gradeX">
                  <td class="center" colspan="6">No data found</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="scheduleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Schedule Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="scheduleForm">
          <input type="hidden" name="application_id" id="application_id" />
          <div class="form-group">
            <label for="scheduledate">Scheduled Date</label>
            <input type="date" class="form-control" name="scheduledate" id="scheduledate" value="<?php echo isset($scheduledate) ? $scheduledate : ''; ?>" required />

          </div>
          <div class="form-group">
            <label for="scheduletime">Scheduled Time</label>
            <input type="time" class="form-control" name="scheduletime" id="scheduletime" value="<?php echo isset($scheduletime) ? $scheduletime : ''; ?>" required />
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
          </div>
        </form>
        <div id="feedback" class="text-center mt-3"></div>
        <div id="spinner" class="d-none text-center mt-3">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
  // Open the modal and pre-fill the schedule data if available
  $('.btn-schedule').on('click', function() {
    var applicationId = $(this).data('id');
    var scheduledate = $(this).data('scheduledate');
    var scheduletime = $(this).data('scheduletime');
    
    $('#application_id').val(applicationId);

    // Pre-fill the fields if schedule data exists
    if (scheduledate && scheduletime) {
      $('#scheduledate').val(scheduledate);
      $('#scheduletime').val(scheduletime);
    } else {
      // Clear the fields if no schedule exists
      $('#scheduledate').val('');
      $('#scheduletime').val('');
    }
  });

  // Handle form submission
  $('#scheduleForm').on('submit', function(e) {
    e.preventDefault();

    $('#spinner').removeClass('d-none'); // Show the spinner
    $('#feedback').text(''); // Clear previous feedback

    $.ajax({
      url: '<?php echo base_url('admin/schedule_application'); ?>',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response) {
        $('#spinner').addClass('d-none'); // Hide the spinner
        if (response.status === 'success') {
          $('#feedback').html('<div class="alert alert-success">Schedule saved successfully!</div>');
          setTimeout(function() {
            $('#scheduleModal').modal('hide');
            location.reload(); // Reload the page to see the updated schedule
          }, 1500);
        } else {
          $('#feedback').html('<div class="alert alert-danger">' + (response.message || 'An error occurred while saving the schedule.') + '</div>');
        }
      },
      error: function() {
        $('#spinner').addClass('d-none'); // Hide the spinner
        $('#feedback').html('<div class="alert alert-danger">An error occurred while saving the schedule.</div>');
      }
    });
  });
});


$('.btn-toggle-reject').on('click', function() {
    var applicationId = $(this).data('id');
    var currentStatus = $(this).data('status');
    var newStatus = (currentStatus === 'rejected') ? 'accepted' : 'rejected';
    
    if (confirm('Are you sure you want to ' + (currentStatus === 'rejected' ? 'un-reject' : 'reject') + ' this application?')) {
        $.ajax({
            url: '<?php echo base_url('admin/toggle_reject_application'); ?>',
            type: 'POST',
            data: { application_id: applicationId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert('Application ' + (newStatus === 'rejected' ? 'rejected' : 'un-rejected') + ' successfully!');
                    location.reload(); // Reload the page to see the updated status
                } else {
                    alert('Failed to update the application status. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred while updating the application status.');
            }
        });
    }
});


    </script>
    <style>
      .btn {
        margin:2px 0;
      }
    </style>