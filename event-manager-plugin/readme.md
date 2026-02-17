# Event Manager Plugin

A custom WordPress plugin that allows administrators to create, manage, and display events.

---

## Features
- Custom Event management using a custom post type
- Event fields: Title, Description, Date, Location, Organizer
- Admin settings page for default event configuration
- Frontend shortcode to display upcoming events

---

## Installation
1. Download or clone the plugin.
2. Upload the `event-manager-plugin` folder to `/wp-content/plugins/`.
3. Log in to WordPress Admin.
4. Go to **Plugins → Installed Plugins**.
5. Activate **Event Manager Plugin**.

---

## Usage

### Adding Events
1. Go to **Admin Dashboard → Events → Add New**
2. Enter:
   - Event title
   - Description
   - Date
   - Location
   - Organizer
3. Click **Publish**

---

### Display Events on Frontend
1. Create or edit a page.
2. Add the shortcode below using a **Shortcode block**:


[events_list]

3. Publish the page.

---

## Settings
- Navigate to **Event Settings** in the admin menu.
- Configure default event options (e.g., default location).
- Save changes.


