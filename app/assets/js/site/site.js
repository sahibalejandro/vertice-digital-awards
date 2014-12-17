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
     * Parallax FX on .category-header when the
     * user scrolls the window.
     */
    var offset = 100; // Max pixels to scroll up the background.
    var maxScroll = 351; // Scroll where the .category-header is not visible.

    $(window).on('scroll', function (e)
    {
        var percent = Math.round(($(this).scrollTop() * 100) / maxScroll);
        var px = Math.round((percent / 100) * offset) - offset;

        $('.category-header').css('background-position', 'center ' + px + 'px');
    });
    // End of: window on scroll

    /*
     * Disable submit buttons on form submit.
     */
    $('button[type=submit]').on('click', function (e)
    {
        var button = this;

        setTimeout(function ()
        {
            button.disabled = true;
        }, 100);
    });
    // End of: 'button[type=submit]' on click

});
// End of: $(document).on('ready', ...)
