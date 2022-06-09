import axios from "axios"


export const getCategories = async () => {
    return (await axios.get(`/api/design-categories`)).data || []
}

export const contactRequest = async (data) => {
    return (await axios.post(`/api/inquiry`, data)).data
}

export const getListPopularItems = async () => {
    return (await axios.post(`/api/items/popular`, {})).data
}

export const getListCaseStudy = async (data) => {
    return (await axios.post(`/api/case-studies`, data)).data
}

export const getCastStudyDetail = async (id) => {
    return (await axios.post(`/api/case-study/info`, {id})).data
}

export const getListPost = async (data) => {
    return (await axios.post(`/api/posts`, data)).data
}

export const getPostDetail = async (id) => {
    return (await axios.post(`/api/post/info`, {id})).data
}


export const getListItemForAllDesign = async (data) => {
    return (await axios.post(`/api/items/all-categories`, data)).data
}

export const getListItemByCategory = async (id, limit) => {
    return (await axios.post(`/api/items/category`, { id, limit })).data
}

export const getItemDetail = async (id) => {
    return (await axios.post(`/api/item/info`, { id })).data
}