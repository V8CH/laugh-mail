<!DOCTYPE html>
<html>
<head>
    <title>Laugh Mail!</title>
</head>
<body>

    <h1>Laugh Mail</h1>

    <h3>Artisinal jokes in your mailbox every day</h3>

    <p>
        The postman won't have to ring twice to get you to the mailbox!
        Laugh Mail sends a daily joke to your home. Each joke is
        printed on premium dye-free cardstock by master letterpress
        craftspeople!
    </p>

    <h3>
        Here's an example of the joy delivered to your doorstep even
        on the darkest days:
    </h3>

    <p><?php echo $assigns["joke"]->body; ?></p>

    <?php if (!empty($assigns["joke"]->punchline)) : ?>
    <p><strong><?php echo $assigns["joke"]->punchline; ?></strong></p>
    <?php endif ?>

</body>
</html>
