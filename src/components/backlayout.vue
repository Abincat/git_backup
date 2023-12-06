<template>
    <main class="bmain-block" >
        <div class="bmain"  >
            <section class="bsection-left" :class="{'blurred':isBlurred}">
                <backnavBar></backnavBar>
            </section>
            <section class="bsection-right" >
                <slot name="section-right-content" >
                </slot>
            </section>
        </div>
    </main>
</template>

<script>
import backnavBar from "./backnavBar.vue";
export default {
    
    // data(){
    //     return{
    //         isBlurred : '',
    //     }
    // },
    props: {
        isBlurred: {
            default: false
        }
    },
    components: {
        backnavBar
    },
    methods:{
    show(){
        this.open = !this.open;
        this.updateBlurStatus(this.open);
        this.$root.$emit('toggleBlur', this.open);
    },
    close(){
        this.open = false; 
        this.updateBlurStatus(false);
    },
    updateBlurStatus(status) {
        this.isBlurred = status;
    }
}

}
</script>