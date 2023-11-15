INSERT INTO
    clients (
        `clientFirstname`,
        `clientLastname`,
        `clientEmail`,
        `clientPassword`,
        `comment`
    )
VALUES
    (
        "Tony",
        "Stark",
        "tony@starkent.com",
        "Iam1ronM@n",
        "I am the real Ironman"
    );

UPDATE `clients`
SET
    `clientLevel` = 3
WHERE
    clientFirstname = "Tony"
    AND clientLastname = "Stark"
UPDATE `inventory`
SET
    `invDescription` = replace (invDescription, "small", "spacious")
WHERE
    invId = 12;

SELECT
    c.classificationName,
    i.invModel
FROM
    carclassification c
    Join inventory i ON c.classificationId = i.classificationId
WHERE
    c.classificationId = 1;

DELETE FROM `inventory`
WHERE
    invId = 1;

UPDATE inventory
SET
    invImage = concat ("/phpmotors", invImage),
    invThumbnail = concat ("/phpmotors", invThumbnail)