<html>
<script>
  async function modifierquantitePanier(id, nombre) {
    try {
      const response = await fetch(`./rsc/fonctions/modifierPanier.php?idCD=${id}&quantite=${nombre}`, {
        method: 'GET'
      });
      if (response.ok) {
        location.reload()
      } else {
        throw new Error('Error deleting item from cart');
      }
    } catch (error) {
      console.error(error);
    }
  }

</script>

</html>