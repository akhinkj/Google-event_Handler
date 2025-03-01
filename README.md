# Google Event Handler

This project handles Google Login, Google Calendar events and triggers phone calls using Twilio. Follow the steps below to set up and run the application.

## Setup Instructions

1. **Configure Environment Variables**
   - Database credentials and other integration details are stored in the `.env.development` file.

2. **Database Setup**
   - Create a database called google_event_alert and Import the database schema from `database/google_event_alert.sql`.
   - Update the database credentials in the `.env` file.

3. **Run the Application**
   - Navigate to the project directory and start a local server using:
     ```sh
     php -S localhost:2000
     ```

4. **Sign-Up Process**
   - After signing up, update your profile with a valid phone number.

## Twilio Integration

- This project uses Twilio in testing mode. Calls will not be received with unverified numbers.
  (currently i have added the credentials of my twilio account, so call will only recieved to my numbers.)
- To receive calls:
  1. Create a Twilio account.
  2. Obtain your **SID**, **TOKEN**, and **Twilio phone number**.
  3. Add these details to your `.env` file.
  4. Update your phone number in the application dashboard to match the one registered in Twilio.

## Handling Google Calendar Events

1. Add an event in Google Calendar that starts within the next 5 minutes.
2. Execute the following command to check for events and trigger a phone call:
   ```sh
   php index.php cron runTask
   ```

## Automating with Cron Jobs

To automate event checks, set up a cron job that runs every 5 minutes:

1. Open the cron editor using:
   ```sh
   crontab -e
   ```
2. Add the following line (replace `/path-to-your-project/` with your original project path):
   ```sh
   */5 * * * * /usr/bin/php /path-to-your-project/index.php Cron runTask > /dev/null 2>&1
   ```

This will check for events every 5 minutes and trigger phone calls accordingly.

---

Need any extra informations, please contact me.
