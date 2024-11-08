// クラスの付け外しのみ
document.addEventListener('DOMContentLoaded', () => {
const text = document.querySelector('.text');
text.classList.add('is-active');

setInterval(() => {
  text.classList.toggle('is-active');
}, 3000);
});
