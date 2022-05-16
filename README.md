# Booking Project (Safa task)

# Installation

-   Its very simple, Just open your MySQL Client (i.e PhpMyAdmin) &amp; create DB:

          booking

-   Then run the following command on your terminal:

          bash run.sh

    or

          sh run.sh

    or

          . run.sh

-   To refresh your database tables, and get a pure one, run this command:

          bash refresh.sh

# Mail Config

-   I use mailtrap to send confirmation mail, use following config in .env file

            MAIL_MAILER=smtp
            MAIL_HOST=smtp.mailtrap.io
            MAIL_PORT=587
            MAIL_USERNAME=add your mailtrap username
            MAIL_PASSWORD=add your mailtrap password
            MAIL_ENCRYPTION=tls
            MAIL_FROM_ADDRESS=booking@email.com
            MAIL_FROM_NAME="${APP_NAME}"
