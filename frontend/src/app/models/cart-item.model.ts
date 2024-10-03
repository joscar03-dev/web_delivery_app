export interface CartItem {
    id: number;  // ID del item en el carrito
    producto: {  // Datos del producto asociado al item
      nombre: string;  // Nombre del producto
    };
    precio_unitario: number;  // Precio unitario del producto
    cantidad: number;  // Cantidad del producto en el carrito
  }