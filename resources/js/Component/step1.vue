<template>
    <div class="main-controller">
        <div class="main-color">
            <div class="react-project">
                <div class="content-1">
                    <aside>
                        <div>
                            <h1 class="logo">Shift </h1>
                        </div>
                        <ol class="content-body">
                            <li>
                                <div class="flex">
                                    <div class="mr-3">1</div>
                                    <div>Basic Details </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex">
                                    <div class="mr-3">2</div>
                                    <div>Additonal Fecture </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex">
                                    <div class="mr-3">3</div>
                                    <div>Vehicle History </div>
                                </div>
                            </li>
                        </ol>
                    </aside>
                </div>
                <div class="content-2">
                    <div class="flex-between">
                        <div class="flex">
                            <div class="mr-3">Suzuki</div>
                            <div class="mr-3 font-bold">2574</div>
                            <div>7777</div>
                        </div>
                        <div class="">
                            <a href="">Exit </a>
                        </div>
                    </div>
                    <div class="main-content">
                        <div class="content">
                            <div>
                                <h1>Basic Details</h1>
                                <div class="mt-20px">
                                    <div class="group1">
                                        <label for="" class="d-flex flex-row">
                                            <label for="">Zip</label>
                                            <input type="text" name="" id="" placeholder="Zip">
                                            <p>place fill your zip code </p>
                                        </label>
                                    </div>
                                    <div class="group1">
                                        <label for="" class="d-flex flex-row">
                                            <label for="">Millage</label>
                                            <input type="text" name="" id="" placeholder="Enter Millage">
                                            <p>ivvalid your code  </p>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <h1>Exterior Color </h1>
                                    <div class="mt-20px">
                                        <label for="" class="w-full">
                                            <input type="text" placeholder="Enter Exterior Color " class="d-block">
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <h1>Body Style</h1>
                                    <label for="" class="select-group">
                                        <select name="body-Style" id="">
                                            <!-- <option value="4_door_suv" selected>4 Door SUV</option> -->
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="css">
@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500&family=Poppins:ital,wght@0,300;0,500;1,200;1,300&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap');
* , *::after , *::before    {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.mt-20px {
    display: flex;
    margin-top: 30px;

}
a {
    text-decoration: none;
}
.group1 {
    width: 100%;
    padding-right: 15px;
    margin-bottom: 15px;
}
.select-group {
    border: 1px solid gray;
    position: relative;

}
.select-group select {
    padding: 10px 20px;
    appearance: none;   
    text-overflow: ellipsis;
    outline: none;
    color: #34435c;
    background-color: transparent;
    line-height: 19px;
    height: 44px;
    width: 100%;
    padding-right: 30px;
    padding-left: 12px;
    border: none;
}
.group1 .d-flex p {
    color : red ;
    font-size: 12px;
    margin-top: 5px;
}
.d-block {
    display: block;
    width: 100%;
}
.group-radio {
    margin-right: 14px;
    margin-bottom: 14px;
    color: #fff;
    background-color: #34435c;
    border-color: #34435c;
    font-weight: 500;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    white-space: nowrap;
    height: 48px;
    min-height: 48px;
    font-size: 16px;
    outline: none;
    padding: 14px 20px;
}
.content {
    margin: 64px auto;
    max-width: 560px;
}
.d-flex {
    display: flex;
}
.flex-row {
    flex-direction: column;
    
}
.radio-input {
    display: none;
    appearance: none;
}
label {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 2px;
}
input {
    padding: 10px 20px;
    border-radius: 4px;
    outline: none;
    border: 1px solid gray;
}
.main-content {
    padding:  0 18px;
    position: relative;
    overflow-y: auto;
    background-color: #fff;

}
.main-controller {
    color:  "#18222e";    
}
.content-2 {
    width: 100%;
}
.font-bold {
    font-weight: 500;
}
.main-color {
    background-color: "#f7f7f7";
    min-height: 100vh;
}
.flex-between {
    display: flex;
    justify-content: space-between;
    width: 100%;
    overflow: hidden;
    padding: 30px 15px;
    border-bottom: 2px solid #f7f7f7;
}
.react-project {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    overflow: hidden;
    min-height: 100vh;
    flex-direction: row;
}
.content-1 {
    display: flex;
    width: 351px;
    background-color: #f7f7f7;
}
aside {
    height: 100%;
    flex : 0 1 351px ;
}
.flex {
    display: flex;
    justify-content: center;
    align-items: center;
}
.mr-3{
    margin-right: 5px;
}
.logo {
    padding: 0;
    border: 0 none;
    cursor: pointer;
    line-height: inherit;
    width: 72px;
    height: 22px;
    margin: 30px 24px;
    color: #06CBA3;
    font-weight: 700;
}
ol li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    font-weight: 500;
    font-size: 16px;    
    letter-spacing: 0;
    font-family: "Roboto" , sans-serif;
    line-height: 24px;
    width: 50%;
    margin: 30px auto;
}
.content-body{
    margin: 60px auto;
}
.w-full {
    width: 100%;
}
</style>

<script>
    import $ from 'jquery'

    
</script>