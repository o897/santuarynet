# Support Ticket System
URL : https://support-ticktes.icu/

The Task
This will be a pretty brief description, a lot of details are left for the developer to choose themselves: which packages to use, what design to choose, etc. The goal is for the system to deliver value to a potential client.

## Why Laravel
I already knew php but I didnt know of its framework. I got an advice that in the workplace most of the times frameworks are used, so itll be great for one to know the language and its framework. So this is my first laravel project.


## Technology used
Spatie has a package for dealing with permissions and roles. It makes it easier to manage roles and the code not being messy.


## Regular users: manage THEIR tickets
After the admin register a user, user can login and sees the only menu item "Tickets" with a table of tickets only created by themselves.

Table of tickets needs to have dropdown filters: by status, priority and category.

They can add a new ticket, but can't edit/delete tickets.

They can click the ticket title in the table to open the page to see more details and ticket activity log and comments, also may add a comment.

## Agent users: manage THEIR tickets
Similar to regular users, agents see only tickets, and only their tickets, but "their" has different meaning - not that they created the tickets, but are assigned to them.

They can edit tickets and add comments.

## Admin users: manage everything
Admins see not only tickets table, but also can view more menu items:

Dashboard with the a weekly report.
Manage Labels, Categories, Priorities and Users, in CRUD way
Also, when editing the ticket, admins can assign Agent user to it - other users cant see that field.

Also, admins should see the menu item called "Logs" which lists all changes that happened to all tickets, like history: who created/updated the ticket and when.



## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

FrontEnd Developer looking forward to your contributions.





## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Login Details

### Regular user
Email : test@mail.com

password : password

### Agent
Email : agent@mail.com

password : password

### Admin
Email: admin@mail.com

passord : password

