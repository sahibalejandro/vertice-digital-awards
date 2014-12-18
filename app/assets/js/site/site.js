/*
 * When document is ready...
 */
$(document).on('ready', function (e)
{
    /*
     * When a participant is selected
     */
    $('.participant').on('click', function (e)
    {
        var participant = $(this).data();

        $('#modal-confirm-vote-photo').prop('src', participant.participantPhoto);
        $('#modal-confirm-vote-name').text(participant.participantName);
        $('#participant_uuid').val(participant.participantUuid);

        $('#modal-confirm-vote').modal();
        return false;
    });
    // End of: '.participant' on click

    /*
     * Disable submit buttons on form submit.
     */
    $('form').on('submit', function (e)
    {
        var button = $(this).find('[type="submit"]').get(0);

        setTimeout(function ()
        {
            button.disabled = true;
        }, 100);
    });
    // End of: 'button[type=submit]' on click

});
// End of: $(document).on('ready', ...)
