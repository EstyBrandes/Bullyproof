
$(document).ready(function ($) {
    function mediaSize() {
        if (window.matchMedia('(max-width: 991px)').matches) {
            $('.hamburger').click(function () {
                $('.ul-sidebar').slideToggle('slow');
            });
            $('.close-it').click(function () {
                $('.ul-sidebar').slideUp("slow");
            });
        }
    };
    /* Call the function */
    mediaSize();
    /* Attach the function to the resize event listener */
    window.addEventListener('resize', mediaSize, false);

})

$(document).ready(() => {
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });
});
$(".parent-edit-btn").click(function () {
    const that = $(this);
    const modal = $("#parentModal");
    const btn = modal.find("#delaySimulation");
    const id = that.data("simulationid");
    setTimeout(() => {
        if (btn) {
            btn.attr("data-simulationid", id)
        }
        
    }, 100)
})
$(".edit-btn").click(function () {
    const id = $(this).data("simulationid");
    const summary = this.dataset.simulationsummary;
    debugger
    const textarea = $("#therapistModal #summaryTextarea");
    setTimeout(() => {
        textarea.val(summary);
        $(textarea).attr("data-id", id)
    },100)

})
$(".hamburger").click(function (e) {
    e.preventDefault();
    $(".sidebar").toggleClass("expanded");
    $(".main-content").toggleClass("sidebar-expanded");
});

(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
})()

$(document).ready(function () {
    // Show the therapist modal and populate the textarea with the current summary
    $('#therapistModal').on('show.bs.modal', function (event) {
        var pen = $(event.relatedTarget); // Button that triggered the modal
        var summary = pen.data('summary'); // Extract info from data-* attributes

        var modal = $(this);
        modal.find('.modal-body textarea').val(summary);
    });

    // Update the summary when the save button is clicked
    $('#saveButton').click(function () {
        const textarea = $('#summaryTextarea');
        var updatedSummary = textarea.val();
        const id = textarea.data("id");
        $.ajax({
            url: 'update_summary.php',
            type: 'post',
            data: { summary: updatedSummary, simulation_id:id },
            success: function (response) {
                debugger

                // handle succes
                if (response == 1) {
                    alert('Simulation summary updated successfully');
                    // Close the modal
                    const tr = $(`[data-simulationid='${id}'][data-simulationsummary]`);
                    tr.attr("data-simulationsummary", updatedSummary);
                    $('#therapistModal').modal('hide');
                } else {
                    alert('There was a problem updating the simulation simulation');
                }
            }
        });
    });

    // Delay the simulation when the delaySimulation button is clicked
    $('#delaySimulation').click(function () {
        const id = $(this).data("simulationid");
        debugger
        $.ajax({
            url: 'delay_simulation.php',
            type: 'post',
            data: {  simulation_id: id },

            success: function (response) {
                // handle success
                debugger
                const toJson = JSON.parse(response);
                const { status, simulation_date} = toJson;
                if (status == 1) {
                    alert('Simulation delayed successfully');
                    const tr = $(`[data-id='${id}'][data-key='simulation_date']`);
                    $(tr).text(simulation_date)

                    // Close the modal
                    $('#parentModal').modal('hide');
                } else {
                    alert('There was a problem delaying the simulation');
                }
            }
        });
    });
});
