document.addEventListener('DOMContentLoaded', () => {
    // Sample data
    const users = [
        { id: 1, name: 'John Doe', email: 'john@example.com', role: 'User' },
        { id: 2, name: 'Jane Smith', email: 'jane@example.com', role: 'Admin' },
        { id: 3, name: 'Bob Johnson', email: 'bob@example.com', role: 'User' },
        { id: 4, name: 'Alice Brown', email: 'alice@example.com', role: 'Admin' }
    ];

    const stats = {
        users: users.length,
        sales: 1200,
        orders: 45
    };

    // Update stats
    document.querySelector('.stat-item:nth-child(1) p').textContent = stats.users;
    document.querySelector('.stat-item:nth-child(2) p').textContent = `$${stats.sales}`;
    document.querySelector('.stat-item:nth-child(3) p').textContent = stats.orders;

    // Populate users table
    const tableBody = document.querySelector('table tbody');
    users.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.role}</td>
        `;
        tableBody.appendChild(row);
    });

    // Add filter functionality
    const filterInput = document.createElement('input');
    filterInput.setAttribute('type', 'text');
    filterInput.setAttribute('placeholder', 'Filter by name...');
    filterInput.classList.add('filter-input');
    document.querySelector('.table-container').insertBefore(filterInput, tableBody);

    filterInput.addEventListener('input', () => {
        const filterValue = filterInput.value.toLowerCase();
        const filteredUsers = users.filter(user => user.name.toLowerCase().includes(filterValue));
        tableBody.innerHTML = '';
        filteredUsers.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>${user.role}</td>
            `;
            tableBody.appendChild(row);
        });
    });
});
