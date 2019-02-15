<template>
    <div class="heroes-list">
        <h1>
            Heroes list
        </h1>
        <div class="text-center mb-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-lg btn-secondary" @click="toggle('tank')" :class="{'active': listType.includes('tank')}"><i class="fas fa-shield-alt"></i></button>
                <button type="button" class="btn btn-lg btn-secondary" @click="toggle('damage')" :class="{'active': listType.includes('damage')}"><i class="fas fa-khanda"></i></button>
                <button type="button" class="btn btn-lg btn-secondary" @click="toggle('heal')" :class="{'active': listType.includes('heal')}"><i class="fas fa-heart"></i></button>
            </div>
        </div>
        <transition-group class="d-flex flex-wrap d-flex justify-content-center" name="fade" mode="out-in" tag="div">
                <a href="" class="hero ml-1 mr-1 mb-2" v-for="hero in currentList" :class="hero.name" :key="hero.name">
                    <div class="img" :class="hero.name"></div>
                    <div class="name bg-dark text-light text-center p-2">
                       <div><strong>{{ hero.name.toUpperCase() }}</strong></div>
                        <div class="d-flex d-flex justify-content-center">
                            <div v-if="hero.type.includes('tank')" class="ml-1" :class="{'text-muted': listType.length > 0 && !listType.includes('tank')}"><i class="fas fa-shield-alt"></i></div>
                            <div v-if="hero.type.includes('damage')" class="ml-1" :class="{'text-muted': listType.length > 0 && !listType.includes('damage')}"><i class="fas fa-khanda"></i></div>
                            <div v-if="hero.type.includes('heal')" class="ml-1" :class="{'text-muted': listType.length > 0 && !listType.includes('heal')}"><i class="fas fa-heart"></i></div>
                        </div>
                    </div>
                </a>
        </transition-group>
    </div>
</template>

<script>
  import _ from 'lodash';

  export default {
    name: 'heroes-list',
    props: {
      'heroes': Array,
    },
    data() {
      return {
        'listType': [],
        'transition': false
      }
    },
    computed: {
      currentList() {
        if (this.transition) {
          return [];
        }
        if (this.listType.length === 0) {
          return this.heroes;
        }

        return _.filter(this.heroes, {'type': this.listType})
      }
    },
    methods: {
      toggle(type) {
        if (this.listType.includes(type)) {
          let index = this.listType.indexOf(type);
          if (index > -1) {
            this.listType.splice(index, 1);
          }
        } else {
          this.listType.push(type);
        }
        this.transition = true;
        setTimeout(() => {
          this.transition = false;
        },500)
      }
    }
  }
</script>