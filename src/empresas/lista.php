<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'src/empresas/post.php',
                // ajax: {
                //     url: 'src/empresas/post.php',
                //     type: 'POST',
                // },
                // columns: [
                //     { data: 'first_name' },
                //     { data: 'last_name' },
                //     { data: 'position' },
                //     { data: 'office' },
                //     { data: 'start_date' },
                //     { data: 'salary' },
                // ],
            });
        });
    </script>