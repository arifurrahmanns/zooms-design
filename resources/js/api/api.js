import axios from "axios"

export const getBasicData = async () => {
    return (await axios.post(`/api/data`)).data || []
}

export const contactRequest = async (data) => {
    return (await axios.post(`/api/inquiry`, data)).data
}
export const orderRequest = async (data) => {
    return (await axios.post(`/api/order-request`, data)).data
}

export const getListPopularItems = async () => {
    return (await axios.post(`/api/items/popular`, {})).data
}

export const getListCaseStudy = async (data) => {
    return (await axios.post(`/api/case-studies`, data)).data
}

export const getCastStudyDetail = async (slug) => {
    return (await axios.post(`/api/case-study/info`, {slug})).data
}

export const getListPost = async (data) => {
    return (await axios.post(`/api/posts`, data)).data
}

export const getPostDetail = async (slug) => {
    return (await axios.post(`/api/post/info`, {slug})).data
}


export const getListItemForAllDesign = async (data) => {
    return (await axios.post(`/api/items/all-categories`, data)).data
}

export const getListItemByCategory = async (slug, limit) => {
    return (await axios.post(`/api/items/category`, { slug, limit })).data
}

export const getItemDetail = async (slug) => {
    return (await axios.post(`/api/item/info`, { slug })).data
}

export const getStaticPageContent = async (name) => {
    return (await axios.post(`/api/static-page`, { name })).data
}
export const getDataForPageBecomeMember = async () => {
    return (await axios.post(`/api/page/become-member/data`, { })).data
}
export const getFaqs = async (data) => {
    return (await axios.post(`/api/faqs`, data)).data
}
export const getDataForHomePage = async () => {
    return (await axios.post(`/api/home-page`, { })).data
}