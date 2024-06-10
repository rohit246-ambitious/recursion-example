<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Members Directory</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <h1>Members Directory</h1>
    <div class = tree-container>
        <?php echo $renderTree; ?>
    </div>
    <button id="addMemberBtn">Add Member</button>

    <div class ='modal' id="addMemberModal" style="display:none;">
    <form id="addMemberForm">
    <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="parent_id">Parent:</label>
            <select id="parent_id" name="parent_id">
                <option value="">None</option>
                <?php foreach ($members as $member): ?>
                    <option value="<?= $member['id'] ?>"><?= htmlspecialchars($member['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Save Changes</button>
    </form>
    </div>
    <script src="views/member/js/script.js"></script>
</body>
</html>
