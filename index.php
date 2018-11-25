<!DOCTYPE html>

<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>עוגיות המזל</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,800" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
   </head>


  <body>

    <?php
      //קוד שבודק האם קיימת עוגיה שסופרת את העוגיות
      if($_COOKIE["count"]==null){
        setcookie("count",1, time()+(365*24*60*60));
      }
    ?>




  <header>
    <h1>עוגיות מזל סיניות</h1>
    <p>
    עוגיית מזל היא עוגייה עם פיסת נייר אשר בתוכה ועליה מודפסות מילות חוכמה או נבואה. לרוב ניתן למצוא עוגיות אלו במסעדות סיניות ברחבי ארצות הברית. הרעיון של עוגיית המזל הוצג לראשונה בתחילת המאה ה-20 על ידי מאקוטו האג'יוורה ב"גן התה היפני", בגולדן גייט פארק (Golden Gate Park) שבסן פרנסיסקו, כמנת כיבוד בזמן התהלכות בגן התה. משפחת האג'יוורה לא התמצאה בעסקים, וכך העוגייה מעולם לא נרשמה כפטנט מסוג שהוא (שם, זכויות יוצרים, העוגייה עצמה וכו').
    <span>מתוך ויקיפדיה</span>
    </p>
  </header>

  <form method="GET" action="">
    <label>באפשרותכם ליצור כאן ועכשיו עוגייה אישית עם טקסט שלכם</label><br>
    <input type="text" name="text" maxlength="20" placeholder="נא הזן כאן את הברכה..."/>
    <input type="number" min="1" name="time" placeholder="נא הזן את תוקף העוגייה בדקות"/>
    <input type="submit" name="submit" value="הכן עוגיה"/>
  </form>


  <?php


  // בודק האם הגיעו נתונים ב GET
  if(isset($_GET["text"]) && isset($_GET["time"])){

    $text = $_GET["text"];

    $count = $_COOKIE["count"] +1; // מוסיף 1 לספירת העוגיות
    setcookie("count",$count, time()+(365*24*60*60));// מגדיר את העוגיה שסופרת עם +1
    setcookie("mazal".$_COOKIE["count"], $text, time()+($_GET["time"]*60));// מייצר עוגיה חדשה בהתאם לטקסט שהמשתמש הכניס

    //פונקציית החזרה לדף המקור ע"מ שהלינק ישאר נקי
    header("Location: /cookie/");
  }

  // לולאה שעוברת על מערך העוגיות, אם קיימת עוגייה שיש בשמה את הטקסט שקבעתי היא מדפיסה למסך עוגייה
  foreach ($_COOKIE as $key => $value) {
    if(strpos($key,"zal")){// פונקציה שמחזירה את המיקום של הטקסט, שמתי רק חלק מהמילה כי הכניס את כל המילה הפונקציה תחזיק 0 כי זה המיקום של המילה
      echo "<div class='cookie'>
        <p>{$value}</p>
      </div>";

    }
  }

  ?>



  </body>
</html>
