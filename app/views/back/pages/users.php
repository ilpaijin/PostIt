<h1 class="page-header">Users</h1>
<h3>Users list</h3>

{% if users %}

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            {% for user in users %}

            <tr>
                <td>
                    {{user.id}}
                </td>
                <td>
                    {{user.username}}
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endif %}
