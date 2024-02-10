<div class="admin-list">
    <div class="card-header">
        <h4>
            <?= $title; ?> List
        </h4>
    </div>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th>
                        #
                        <?php echo $user['userID']; ?>
                    </th>
                    <td>
                        <?php echo $user['userStatus']; ?>
                    </td>
                    <td>
                        <?php echo $user['userName']; ?>
                    </td>
                    <td>
                        <?php echo $user['userEmail']; ?>
                    </td>
                    <td>
                        <?php echo $user['userPhone']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button onclick="confirmDeleteUser(<?php echo $user['userID']; ?>)" type="button"
                                class="btn btn-danger">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00002 25.3333C8.00002 26.0406 8.28097 26.7189 8.78107 27.219C9.28117 27.719 9.95944 28 10.6667 28H21.3334C22.0406 28 22.7189 27.719 23.219 27.219C23.7191 26.7189 24 26.0406 24 25.3333V9.33333H8.00002V25.3333ZM10.6667 12H21.3334V25.3333H10.6667V12ZM20.6667 5.33333L19.3334 4H12.6667L11.3334 5.33333H6.66669V8H25.3334V5.33333H20.6667Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-success">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.33331 22.6835L15.2173 22.6635L28.06 9.94355C28.564 9.43955 28.8413 8.77021 28.8413 8.05821C28.8413 7.34621 28.564 6.67688 28.06 6.17288L25.9453 4.05821C24.9373 3.05021 23.1786 3.05554 22.1786 4.05421L9.33331 16.7769V22.6835ZM24.06 5.94354L26.1786 8.05421L24.0493 10.1635L21.9346 8.05021L24.06 5.94354ZM12 17.8889L20.04 9.92488L22.1546 12.0395L14.116 20.0009L12 20.0075V17.8889Z"
                                        fill="white" />
                                    <path
                                        d="M6.66667 28H25.3333C26.804 28 28 26.804 28 25.3333V13.776L25.3333 16.4427V25.3333H10.8773C10.8427 25.3333 10.8067 25.3467 10.772 25.3467C10.728 25.3467 10.684 25.3347 10.6387 25.3333H6.66667V6.66667H15.796L18.4627 4H6.66667C5.196 4 4 5.196 4 6.66667V25.3333C4 26.804 5.196 28 6.66667 28Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>