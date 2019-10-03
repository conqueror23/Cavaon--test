<template>
    <div class="wrapper">
        <div>
            <h2>Task Remove</h2>
            {{data}}
        </div>
        <div>
            <h2> Preview</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name:'Project_Tasks_Page',

        props:['data'],
        data(){

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    .wrapper{
        display: flex;
        flex:1;
    }
.wrapper div{
    border: 1px solid black;
}
</style>
