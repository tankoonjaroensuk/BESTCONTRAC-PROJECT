<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="filter. css">
</head>
<style>
    /* Add your CSS styling here */
    body {
        font-family: "Prompt", sans-serif;
        font-weight: 400 ;
        font-size: 20px;
    }

    

    select, button {
        width: 10%;
        height: 50px;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        border-radius: 30px;
    }

    button {
        background-color: #ff3232;
        color: white;
        border: none;
        cursor: pointer;
        margin-left: 900px;
    }

    button:hover {
        background-color: black;
    }

    .container-search{
        width: 1980px;
        margin-top: 100px;
    }

    .container-search h1{
        text-align: center;
        font-family: "Prompt", sans-serif;
        font-weight: 400 ;
        font-size: 60px;
        color: navy ;
        
        
       
    }
    .form-container{
        width: 50%;
        height: 300px;
       
       
        
    }

    #dropdown1 {
        width: 320px;
        height: 80px;
        font-size: 25px;
        margin-top: 10px;
        
    }
    
    #dropdown2{
        width: 320px;
        height: 80px;
        font-size: 25px;
        margin-top: 10px;
    }
    #dropdown3{
        width: 320px;
        height: 80px;
        font-size: 25px;
        margin-top: 10px;
    }
    

    .place01{
        /* background-color: #ff3232; */
    }

    .place01 select{
        border-radius: 10px;
        display: flex;
        margin-left: 650px;
    }
    

    .place02 select{
        border-radius: 10px;
        display: flex;
        margin-left: 20px;
    }
    .all{
        display: flex;
    }

    .first{
        width: 50%;
        /* background-color: aqua; */
        
    }

    .second{
        width: 50%;
        /* background-color: #ff4b4b; */
    }

</style>
<body>
    <div class="container-search">
        <h1>การให้บริการทั้งหมดของเรา</h1>
        <div class="all">
        <div class="first">
        <div class="form-container">
            <form action="process_form.php" class="place01" method="post">
                <!-- Replace the names and options with the actual values you need -->
                
                <select id="dropdown1" name="dropdown1" >
                    <option value="option1">ประเภทการให้บริการ</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                
                <select id="dropdown2" name="dropdown2">
                    <option value="option1">เรทราคาช่าง</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                
                <select id="dropdown3" name="dropdown3">
                    <option value="option1">ประสบการณ์การทำงาน</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                <!-- Repeat for other dropdowns -->

                
            </form>
            
        </div>


        </div>

        <div class="second">
        <div class="form-container">
            <form action="process_form.php" class="place02" method="post">
                <!-- Replace the names and options with the actual values you need -->
                
                <select id="dropdown1" name="dropdown1" >
                    <option value="option1">ประเภทสถานที่การให้บริการ</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                
                <select id="dropdown2" name="dropdown2">
                    <option value="option1">จำนวนช่างที่ต้องการ</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                
                <select id="dropdown3" name="dropdown3">
                    <option value="option1">จังหวัด/เขต</option>
                    <option value="option2">Option 2</option>
                    <!-- Add other options here -->
                </select>

                <!-- Repeat for other dropdowns -->

                
            </form>
            
        </div>
      
        </div>
         
        </div>
        <button type="submit">Submit</button>
    </div>
    
</body>
</html>