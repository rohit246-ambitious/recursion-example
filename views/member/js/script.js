
$(document).ready(function() {

    $("#addMemberModal").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    $('#addMemberBtn').click(function() {
        $('#addMemberModal').dialog("open");
    });

    $('#addMemberForm').submit(function(event) {
        event.preventDefault();
        var name = $('#name').val();
        var parent_id = $('#parent_id').val();

        if (!name.match(/^[a-zA-Z ]+$/)) {
            alert('Name must contain only letters.');
            return;
        }

        $.ajax({
            url: './index.php?action=addMember',
            type: 'POST',
            data: { name: name, parent_id: parent_id },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    $('.tree-container').empty();
                    var tree = data.tree;
                    $('.tree-container').html(tree);
                    $('#addMemberModal').dialog("close");
                    $('#addMemberForm')[0].reset();
                } else {
                    alert(data.message);
                }
            }
        });
    });

});