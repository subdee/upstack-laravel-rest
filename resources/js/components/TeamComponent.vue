<template>
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">
                <strong>{{name}}</strong>
                <button type="button" class="close pull-right" @click="del">
                    <span>&times;</span>
                </button>
            </div>

            <div class="card-body">
                <player-component
                    v-for="player in players"
                    v-bind="player"
                    :key="player.id"
                    @update="update"
                    @delete="del">
                </player-component>
            </div>
        </div>
    </div>
</template>

<script>
    import PlayerComponent from './PlayerComponent';

    export default {
        methods: {
            update(val) {
                this.$emit('update', this.id, val.target.value);
            },
            del() {
                this.$emit('delete', this.id);
            }
        },
        props: ['id', 'name', 'players'],
        components: {PlayerComponent}
    }
</script>

<style scoped>

</style>
