<template>
  <div class="container mx-auto mt-20">
    <div v-if="$apollo.queries.post.loading" class="animate-pulse">
      <div class="w-1/3 h-4 bg-gray-400"></div>
      <div class="w-1/3 h-8 mt-10 mb-12 bg-gray-400"></div>
      <div class="w-2/4 h-4 mb-4 bg-gray-400"></div>
      <div class="w-4/4 h-4 mb-4 bg-gray-400"></div>
      <div class="w-3/4 h-4 mb-4 bg-gray-400"></div>
      <div class="w-1/4 h-4 mb-4 bg-gray-400"></div>
      <div class="flex mb-24 mt-12">
        <div class="mr-4 w-16 h-16 rounded-full bg-gray-400"></div>
        <div class="flex flex-col justify-center">
          <div class="w-24 h-4 mb-2 bg-gray-400"></div>
          <div class="w-48 h-4 bg-gray-400"></div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="text-lg text-gray-600">By {{ post.author.name }} in {{ post.topic.name }} - 3 hours ago</div>
      <h1 class="font-bold text-5xl mt-10 mb-12">{{ post.title }}</h1>

      <p class="text-gray-700 pb-3 mb-12 whitespace-pre-line" v-html="post.content"></p>

      <div class="flex mb-24">
        <div class="mr-4">
          <img :src="'https://api.adorable.io/avatars/16/' + post.author.name + '.png'" :title="post.author.name"
               class="w-16 h-16 rounded-full"/>
        </div>
        <div class="flex flex-col justify-center">
          <div class="text-gray-600">
            Written by
            <router-link :to="{name: 'author', params:{id: post.author.id}}" class="hover:underline">{{ post.author.name }}</router-link>
          </div>
          <div class="text-gray-500 text-sm">Published in
            <router-link :to="{name: 'topic', params:{slug: post.topic.slug}}" class="hover:underline">
              {{ post.topic.name }}
            </router-link>
            on May 19, 2020
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";

export default {
  name: "Post",
  apollo: {
    post: {
      query: gql`
        query FIND_POST($id: ID!) {
          post(id: $id) {
            id
            title
            content
            created_at
            topic {
              name
              slug
            }
            author {
              id
              name
            }
          }
        }
      `,
      variables() {
        return {
          id: this.$route.params.id
        }
      }
    }
  }
}
</script>

<style scoped>

</style>
